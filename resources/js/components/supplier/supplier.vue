<style>
.primary {
  color: black;
}

.file-upload-form,
.image-preview {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  padding: 20px;
}
img.preview {
  height: 330;
  width: 301px;
  background-color: white;
  border: 1px solid black;
  padding: 5px;
}

input[type="file"] {
  color: white;
  background-color: darkcyan;
}

img {
  height: 119px;
}
</style>

<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Supplier Information</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <!-- Add New -->
            <router-link :to="{ name: 'c-supplier' }">
              <button class="btn btn-success">
                Add new
                <i class="fas fa-plus"></i>
              </button>
            </router-link>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-hover">
          <thead>
            <tr class="primary">
              <th>ID</th>
              <th>Supplier Name</th>
              <th>Supplier Address</th>
              <th>Main Product</th>
              <th>Supplier Phone</th>
              <th>Created At</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="s in displayedSuppliers" :key="s.id + + '-label'">
              <td>{{s.id}}</td>

              <td>{{s.supplier_name }}</td>
              <td>{{s.supplier_address}}</td>
              <td>{{s.main_product}}</td>
              <td>{{s.supplier_phone}}</td>
              <td>{{s.created_at | myDate}}</td>
              <td>
                <!-- <router-link
                  v-bind:to="{name: 'update',params: {id: product.id}}"
                 
                >-->
                <router-link v-bind:to="{name: 'u-supplier', params: {id: s.id }}">
                  <i class="fa fa-edit green"></i>
                </router-link>
                <!-- <router-link
                  :to="{name: 'update', params: { id: product.id }}"
                  class="btn btn-primary"
                >Edit</router-link>-->
              </td>
              <td>
                <a href="#" @click="deleteSuppliers(s.id)">
                  <i class="fa fa-trash-alt red"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item" style="margin-left: 27em;">
              <button type="button" class="page-link" v-if="page != 1" @click="page--">Previous</button>
            </li>
            <li class="page-item">
              <button
                type="button"
                class="page-link"
                v-for="pageNumber in pages.slice(page-1, page+5)"
                :key="pageNumber"
                @click="page = pageNumber"
              >{{pageNumber}}</button>
            </li>
            <li class="page-item">
              <button
                type="button"
                @click="page++"
                v-if="page < pages.length"
                class="page-link"
              >Next</button>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  data() {
    return {
      page: 1,
      perPage: 1,
      pages: [],
      pId: "",
      editMode: false,
      // products: {},
      query: null,
      results: [],
      viewProd: {},
      suppliersp: [],
      suppliers: {},

      form: new Form({
        id: "",
        supplier_name: "",
        supplier_address: "",
        main_product: "",
        supplier_phone: ""
      })
    };
  },

  methods: {
    paginate(suppliersp) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return suppliersp.slice(from, to);
    },
    setPages() {
      let numberOfPages = Math.ceil(this.suppliersp.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    onChangePage(pageOfItems) {
      // update page of items
      this.pageOfItems = pageOfItems;
    },
    getSuppliers() {
      axios.get("api/suppliers").then(({ data }) => {
        this.suppliersp = data;
        console.log("aaaa");
        console.log(this.suppliersp);
        this.test = "aaaaa";
      });
    },

    updateSupplier(id) {
      const Toast = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: 3000
      });

      this.$Progress.start();
      this.form
        .put("api/suppliers/" + this.form.id)
        .then(res => {
          this.suppliers = resp.data;
          Toast.fire({
            type: "success",
            title: "product update successfully"
          });
          this.$Progress.finish();
          Fire.$emit("afterCreated");
          $("#addNew").modal("hide");
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },

    deleteSuppliers(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        //send the request to the server
        if (result.value) {
          this.form
            .delete("api/suppliers/" + id)
            .then(result => {
              Fire.$emit("afterCreated");
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
              // Fire.$emit("afterCreated");
            })
            .catch(() => {
              Swal.fire({
                type: "error",
                title: "Oops...",
                text: "Something went wrong!"
              });
            });
        }
      });
    },
    loadSuppliers() {
      axios.get("api/suppliers").then(({ data }) => {
        this.suppliers = data;
        this.test = "aaaaa";
      });
    },
    createProduct() {
      this.$Progress.start();
      this.form
        .post("api/suppliers")
        .then(() => {
          Fire.$emit("afterCreated");

          this.$Progress.finish();
          Toast.fire({
            type: "success",
            title: "Product created successfully"
          });
        })
        .catch(() => {
          // this.$Progress.fail();
        });
    }
  },

  created() {
    this.getSuppliers();
    // help to load the products after any changes like delete,edit or search
    this.loadSuppliers();
    Fire.$on("afterCreated", () => {
      this.loadSuppliers();
      this.getSuppliers();
    });
    // setInterval(() => this.loadProducts(), 3000);
  },
  computed: {
    displayedSuppliers() {
      return this.paginate(this.suppliersp);
    }
  },
  watch: {
    suppliersp() {
      this.setPages();
    }
  },
  filters: {
    trimWords(value) {
      return (
        value
          .split(" ")
          .splice(0, 20)
          .join(" ") + "..."
      );
    }
  }
};
</script>

  
