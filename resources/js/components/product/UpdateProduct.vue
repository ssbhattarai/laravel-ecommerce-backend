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
        <h3 class="card-title">Update</h3>
      </div>
      <form @submit.prevent="onSubmit($event)">
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
          <router-link :to="{ name: 'products' }">
            <button type="submit" class="btn btn-success" @click.prevent="update">Update</button>
          </router-link>

          <!-- <div class="card-footer mb-3">
          <router-link :to="{ name: 'products' }">
            <button type="button" class="btn btn-success" @click.prevent="update">Update</button>
          </router-link>-->

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
      products: {},
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