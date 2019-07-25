<template>
  <div class="container" id="app">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Available</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <button class="btn btn-success" @click="newModal">
              Add New
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed">
          <thead>
            <tr>
              <th @click="sort('id')">ID</th>
              <th @click="sort('product_name')">Product Name</th>
              <th @click="sort('type')">Type</th>
              <th @click="sort('weight')">Weight(N/KG)</th>
              <th @click="sort('created_at')">Created At</th>
              <th @click="sort('description')">Description</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.id">
              <td>{{product.id}}</td>

              <td>{{product.product_name | upText}}</td>
              <td>{{product.type}}</td>
              <td>{{product.weight}}</td>
              <td>{{product.created_at | myDate}}</td>
              <td>{{product.description}}</td>
              <td>
                <a href="#" @click="editModal(product)">
                  <i class="fa fa-edit green"></i>
                </a>
              </td>
              <td>
                <a href="#" @click="deleteProducts(product.id)">
                  <i class="fa fa-trash-alt red"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
        debug: sort={{currentSort}}, dir={{currentSortDir}}
      </div>
    </div>
    <router-view></router-view>
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New Product</h5>
            <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? updateProduct() : createProduct()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.product_name"
                  type="text"
                  name="product_name"
                  class="form-control"
                  placeholder="Product Name"
                  :class="{ 'is-invalid': form.errors.has('product_name') }"
                />
                <has-error :form="form" field="product_name"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.type"
                  type="text"
                  name="type"
                  class="form-control"
                  placeholder="Type"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                />
                <has-error :form="form" field="type"></has-error>
              </div>

              <div class="form-group">
                <input
                  v-model="form.weight"
                  type="text"
                  name="weight"
                  class="form-control"
                  placeholder="Weight"
                  :class="{ 'is-invalid': form.errors.has('weight') }"
                />
                <has-error :form="form" field="weight"></has-error>
              </div>
              <div class="form-group">
                <textarea
                  v-model="form.description"
                  name="description"
                  class="form-control"
                  placeholder="Description"
                  :class="{ 'is-invalid': form.errors.has('description') }"
                />
                <has-error :form="form" field="description"></has-error>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
              <button v-show="!editMode" type="submit" class="btn btn-primary">Create Product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //sorting
      currentSort: "product_name",
      currentSortDir: "asc",

      productCount: null,
      editMode: false,
      products: {},
      test: "hhhh",
      form: new Form({
        id: "",
        product_name: "",
        type: "",
        description: "",
        weight: ""
      })
    };
  },
  methods: {
    updateProduct(id) {
      const Toast = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: 3000
      });

      this.$Progress.start();
      this.form
        .put("api/products/" + this.form.id)
        .then(() => {
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
    editModal(product) {
      this.editMode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(product);
    },
    newModal() {
      this.editMode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    deleteProducts(id) {
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
            .delete("api/products/" + id)
            .then(result => {
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
              Fire.$emit("afterCreated");
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
    loadProducts() {
      axios.get("api/products").then(({ data }) => {
        this.products = data;
        this.test = "aaaaa";
      });
    },
    countProducts() {
      axios.get("api/products").then(({ data }) => this.products.count);
    },
    createProduct() {
      this.$Progress.start();
      this.form
        .post("api/products")
        .then(() => {
          Fire.$emit("afterCreated");
          $("#addNew").modal("hide");

          this.$Progress.finish();
          Toast.fire({
            type: "success",
            title: "Product created successfully"
          });
        })
        .catch(() => {
          this.$Progress.fail();
        });
    }
  },

  created() {
    Fire.$on("searching", () => {
      let query = this.$parent.search;
      axios
        .get("api/findProduct?q=" + query)
        .then(data => {
          // this.test = "sdfsdfsdfsdf";
          this.products = data.data.data;
        })
        .catch(() => {
          console.log("Failed to search");
          this.loadProducts();
        });
    });
    // help to load the products after any changes like delete,edit or search
    this.loadProducts();
    Fire.$on("afterCreated", () => {
      this.loadProducts();
    });
    // setInterval(() => this.loadProducts(), 3000);
  }
};
</script>

  
