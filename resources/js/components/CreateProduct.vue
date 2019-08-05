<style>
.form-control:focus {
  border-color: #6265e4 !important;
  box-shadow: 0 0 5px rgba(98, 101, 228, 1) !important;
}
</style>
<template>
  <div class="container">
    <div class="card mb-3">
      <div class="card-header bg-dark">
        <h3 class="card-title">create products</h3>
      </div>
      <form>
        <div class="card-body">
          <div class="form-group">
            <label for="product_name">Name of Produdct</label>
            <input
              v-model="form.product_name"
              type="text"
              class="form-control"
              id="product_name"
              placeholder="Enter Product name"
              required
              max="20"
            />
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
          </div>
          <div class="form-group">
            <label class="mr-sm-2" for="type">Type</label>
            <select
              class="custom-select mr-sm-2 form-control"
              id="type"
              v-model="form.type"
              name="type"
              required
            >
              <option default>Select Type</option>
              <option value="1">Fruits</option>
              <option value="2">Veg</option>
              <option value="3">Animals</option>
            </select>
            <has-error :form="form" field="type"></has-error>
          </div>
          <div class="form-group">
            <label for="weight">Weight (kg/N)</label>
            <input
              v-model="form.weight"
              type="text"
              class="form-control"
              id="weight"
              name="weight"
              placeholder="Enter Weight"
            />
          </div>
          <div class="form-group">
            <label class="mr-sm-2" for="description">Description</label>
            <textarea
              v-model="form.description"
              name="description"
              class="form-control"
              placeholder="Description"
              :class="{ 'is-invalid': form.errors.has('description') }"
              required
            />
            <has-error :form="form" field="description"></has-error>
          </div>
          <div class="form-group">
            <label for="image">Select Image</label>
            <input
              type="file"
              name="image"
              id="image"
              class="form-control"
              @change="imageChanged"
              required
              :class="{ 'is-invalid': form.errors.has('image') }"
              value="Choose Image"
              onchange="validate_fileupload(this.value);"
            />
            <has-error :form="form" field="image"></has-error>
            <div class="image-preview" v-if="form.image.length > 0">
              <img class="preview" :src="form.image" />
            </div>
            <!-- <has-error :form="form" field="image"></has-error> -->
            <!-- <br /> -->
            <!-- <input type="button" class="btn btn-info" value="Upload" id="upload" /> -->
          </div>
        </div>

        <div class="card-footer mb-3">
          <!-- <router-link :to="{ name: 'products' }"> -->
          <button type="button" class="btn btn-success" @click="productCreate">Create</button>
          <!-- </router-link> -->

          <router-link :to="{ name: 'products' }">
            <button type="button" class="btn btn-danger">Close</button>
          </router-link>
        </div>
      </form>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //sorting
      // image: "",
      editMode: false,
      products: {},
      fields: {},
      errors: {},
      form: new Form({
        id: "",
        product_name: "",
        type: "",
        description: "",
        weight: "",
        image: "",
        imageName: ""
      })
    };
  },
  methods: {
    productCreate() {
      this.errors = {};
      axios
        .post("api/products", this.form)
        .then(response => {
          Swal.fire({
            position: "center",
            type: "success",
            title: "Product created sucessfully",
            showConfirmButton: false,
            timer: 1000
          });
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
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
    }
  },

  created() {
    // help to load the products after any changes like delete,edit or search
    this.loadProducts();
    Fire.$on("afterCreated", () => {
      this.loadProducts();
    });
    // setInterval(() => this.loadProducts(), 3000);
  }
};
</script>
