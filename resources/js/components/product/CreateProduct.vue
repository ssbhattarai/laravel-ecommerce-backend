<style>
.form-control:focus {
  border-color: #6265e4 !important;
  box-shadow: 0 0 5px rgba(98, 101, 228, 1) !important;
}

.error-message {
  color: red;
}
</style>
<template>
  <div class="container">
    <div class="card mb-3">
      <div class="card-header bg-dark">
        <h3 class="card-title">create products</h3>
      </div>
      <form @submit.prevent="submitForm">
        <div class="card-body">
          <div class="form-group">
            <label for="product_name">Name of Produdct</label>
            <input
              v-model="form.product_name"
              type="text"
              class="form-control"
              id="product_name"
              name="product_name"
              placeholder="Enter Product name"
              required
            />
            <p v-if="$v.form.product_name.$invalid" class="error-message">This field is invalid*</p>
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
              <option value>Select Type</option>
              <option value="1">Fruits</option>
              <option value="2">Veg</option>
              <option value="3">Animals</option>
            </select>
            <p v-if="$v.form.type.$invalid" class="error-message">This Field is invalid*</p>
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
            <p v-if="$v.form.weight.$invalid" class="error-message">This Field is invalid*</p>
          </div>
          <div class="form-group">
            <label class="mr-sm-2" for="type">Weight Type</label>
            <select
              class="custom-select mr-sm-2 form-control"
              id="weight_type"
              v-model="form.weight_type"
              name="weight_type"
              required
            >
              <option value>Select</option>
              <option value="1">Kg</option>
              <option value="2">Muri</option>
              <option value="3">Pathi</option>
              <option value="4">Mana</option>
              <option value="5">Dharni</option>
              <option value="6">Ota</option>
            </select>
            <p v-if="$v.form.weight_type.$invalid" class="error-message">Please choose the *</p>
          </div>
          <div class="form-group">
            <label class="mr-sm-2" for="description">Description</label>
            <textarea
              v-model="form.description"
              name="description"
              class="form-control"
              placeholder="Description"
            />
            <p v-if="$v.form.description.$invalid" class="error-message">This Field is invalid*</p>
          </div>
          <div class="form-group">
            <label for="image">Select Image</label>
            <!-- <input
              type="file"
              name="image"
              id="image"
              class="form-control"
              @change="imageChanged"
              required
              value="Choose Image"
              onchange="validate_fileupload(this.value);"
            />-->
            <input
              type="file"
              name="image"
              id="image"
              class="form-control"
              @change="imageChanged"
              required
            />
            <p v-if="$v.form.image.$invalid" class="error-message">Please select an image*</p>
            <div class="image-preview" v-if="form.image.length > 0">
              <img class="preview" :src="form.image" />
            </div>
          </div>
        </div>

        <div class="card-footer mb-3">
          <router-link :to="{ name: 'products' }">
            <button
              type="submit"
              class="btn btn-success"
              :disabled="$v.form.product_name.$invalid || $v.form.weight.$invalid  || $v.form.weight_type.$invalid ||
              $v.form.description.$invalid || $v.form.image.$invalid "
              @click="productCreate"
            >Create</button>
          </router-link>

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
import {
  required,
  minLength,
  between,
  integer,
  maxLength,
  alpha
} from "vuelidate/lib/validators/";
export default {
  data() {
    return {
      products: {},
      form: new Form({
        id: "",
        product_name: "",
        type: "",
        description: "",
        weight: "",
        image: "",
        weight_type: ""
      }),
      submitted: false
    };
  },
  validations: {
    form: new Form({
      product_name: {
        required,
        minLength: minLength(4),
        alpha
      },
      type: {
        required
      },
      weight: {
        required,
        integer
      },
      weight_type: {
        required
      },
      description: {
        required,
        maxLength: maxLength(120)
      },
      image: {
        required
      }
    })
  },
  methods: {
    submitForm() {
      if (!this.$v.form.$invalid) {
        console.log("Form is submitted", this.form);
      } else {
        console.log("🔴invalid Form");
      }
    },
    productCreate() {
      console.log("🖕");
      this.$Progress.start();
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
          this.$Progress.finish();
        })
        .catch(
          Swal.fire({
            type: "error",
            title: "Oops...",
            text: "Something went wrong!"
          })
        );
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
      // console.log(file);
      let reader = new FileReader();
      this.form.imageName = file;

      if (file["size"] < 2111775) {
        reader.onloadend = () => {
          // console.log("RESULT", reader.result);
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
    loadProducts() {
      axios.get("api/products").then(({ data }) => {
        this.products = data;
        this.test = "aaaaa";
      });
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
