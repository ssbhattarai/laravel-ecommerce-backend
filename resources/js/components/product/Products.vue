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
        <h3 class="card-title">
          Available Products
          <a href="#" @click="exportExcel" style="margin-left: 515px;">
            <button class="btn btn-outline-info">
              Export Excel
              <i class="fas fa-download"></i>
            </button>
          </a>
        </h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <!-- Add New -->
            <router-link :to="{ name: 'create' }">
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
              <th>Product Name</th>
              <th>Type</th>
              <th>Weight</th>
              <th>Weight Type</th>
              <th>Created At</th>
              <th>Description</th>
              <th>image</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.id">
              <td>{{product.id}}</td>

              <td>{{product.product_name }}</td>
              <td>{{product.type}}</td>
              <td>{{product.weight}}</td>
              <td>{{product.weight_type}}</td>
              <td>{{product.created_at | myDate}}</td>
              <td>{{product.description}}</td>
              <td>{{product.image}}</td>
              <td>
                <!-- <router-link
                  v-bind:to="{name: 'update',params: {id: product.id}}"
                 
                >-->
                <router-link v-bind:to="{name: 'update', params: {id: product.id }}">
                  <i class="fa fa-edit green"></i>
                </router-link>
                <!-- <router-link
                  :to="{name: 'update', params: { id: product.id }}"
                  class="btn btn-primary"
                >Edit</router-link>-->
              </td>
              <td>
                <a href="#" @click="deleteProducts(product.id)">
                  <i class="fa fa-trash-alt red"></i>
                </a>
              </td>
              <td>
                <button
                  type="button"
                  class="btn btn-primary"
                  data-toggle="modal"
                  data-target="#viewModal"
                  @click="viewp(product.id)"
                >
                  <i class="far fa-eye"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <router-view></router-view>

    <div
      class="modal fade"
      id="viewModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="viewModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewModalLabel">Product Full Information.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-9 col-md-5">Product Name</div>
              <div class="col-xs-3 col-md-5">
                <b>{{ viewProd.product_name}}</b>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-9 col-md-5">Category</div>
              <div class="col-xs-3 col-md-5">
                <b>{{ viewProd.type}}</b>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-9 col-md-5">weight</div>
              <div class="col-xs-3 col-md-5">
                <b>{{ viewProd.weight }}</b>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-9 col-md-5">weight type</div>
              <div class="col-xs-3 col-md-5">
                <b>{{ viewProd.weight_type}}</b>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-9 col-md-5">Description</div>
              <div class="col-xs-3 col-md-5">
                <b>{{ viewProd.description }}</b>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-9 col-md-5">Create at</div>
              <div class="col-xs-3 col-md-5">
                <b>{{ viewProd.created_at | myDate}}</b>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-9 col-md-5">image</div>
              <div class="col-xs-3 col-md-5">
                <!-- <button @click="getImgUrl"></button> -->
                <!-- <img v-bind:src="" /> -->
                <div>
                  <img :src="'/uploades/images/' + viewProd.image" style="height:119px" />
                </div>
              </div>
              <!-- <div class="image-preview"> -->
              <!-- <img class="preview" id="image" :src="getImgUrl" /> -->
              <!-- </div> -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
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
      // image: "",
      pId: "",
      editMode: false,
      // id: "",
      products: {},
      viewProd: {},
      // id = this.form.id,
      form: new Form({
        id: "",
        product_name: "",
        type: "",
        description: "",
        weight: "",
        image: "",
        imageName: "",
        weight_type: ""
      })
    };
  },
  methods: {
    getImgUrl() {
      // return require("../assets/" + pic);
      let pic = this.viewProd.image;
      console.log(pic);
      return require("../../../../public/uploades/images/" + pic);
      popup = window.open();
      popup.document.write("image");
      popup.focus(); //required for IE
      popup.print();
    },
    displayImgae() {},
    viewp(id) {
      // id = this.form.id;
      this.form
        .get("api/getProduct/" + id)
        .then(resp => {
          this.viewProd = resp.data;
          console.log(resp.data);
        })

        .catch(function() {
          alert("Could not load your data");
        });
    },

    exportExcel() {
      this.$Progress.start();
      axios({
        url: "api/export",
        method: "GET",
        responseType: "blob" // important
      })
        .then(response => {
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement("a");
          link.href = url;
          link.setAttribute("download", "products.xlsx"); //or any other extension
          document.body.appendChild(link);
          link.click();
        })
        .catch();
      this.$Progress.finish();
    },
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
        .then(res => {
          this.products = resp.data;
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
    validate_fileupload(fileName) {
      var allowed_extensions = new Array("jpg", "png", "gif");
      var file_extension = fileName
        .split(".")
        .pop()
        .toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

      for (var i = 0; i <= allowed_extensions.length; i++) {
        if (allowed_extensions[i] == file_extension) {
          return true; // valid file extension
        }
      }

      return false;
    },
    imageChanged(e) {
      // console.log("uploadling");
      let file = e.target.files[0];
      console.log(file);
      let reader = new FileReader();
      this.form.imageName = file["name"];

      if (file["size"] < 2111775) {
        reader.onloadend = () => {
          console.log("RESULT", reader.result);
          this.form.image = reader.result;
        };
        console.log(reader.readAsDataURL(file));
      } else {
        Swal.fire({
          type: "error",
          title: "Oops...",
          text: "Image size must be less than 2 MB."
        });
      }
    },

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
      // this.editMode = true;
      // this.form.reset();
      // $("#addNew").modal("show");
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

  
