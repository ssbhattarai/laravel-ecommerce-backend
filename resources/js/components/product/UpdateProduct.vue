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
            <label class="mr-sm-2" for="type">Weight Type</label>
            <select
              class="custom-select mr-sm-2 form-control"
              id="weight_type"
              v-model="form.weight_type"
              name="weight_type"
              required
            >
              <option value>Select</option>
              <option value="kg">Kg</option>
              <option value="pathi">Pathi</option>
              <option value="mana">Mana</option>
              <option value="dharni">Dharni</option>
              <option value="Ota">Ota</option>
            </select>
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
            <!-- <img src="{{asset('public/uploades/images/image')}}/"> -->
            <div class="image-preview" v-if="form.image.length > 0">
              <img class="preview" :src="form.image" />
            </div>
            <!-- <br /> -->
            <!-- <input type="button" class="btn btn-info" value="Upload" id="upload" /> -->
          </div>
        </div>

        <div class="card-footer mb-3">
          <router-link :to="{ name: 'products' }">
            <button type="submit" class="btn btn-success" @click="saveForm()">Update</button>
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
      productId: null,
      products: {},
      form: new Form({
        id: "",
        product_name: "",
        type: "",
        description: "",
        weight: "",
        image: ""
      })
    };
  },
  // created() {
  //   let uri = "api/products";
  //   this.axios.get(uri).then(response => {
  //     this.form = response.data;
  //     console.log(this.form);
  //   });
  // },

  methods: {
    saveForm() {
      // event.preventDefault();

      var app = this;

      var newForm = app.form;

      axios
        .patch("api/products/" + app.productId, newForm)

        .then(function(resp) {
          // alert("this is too much");
          // app.$router.replace("/products/:id");
          console.log("data update susefully");
        })

        .catch(function(resp) {
          console.log(resp);
          alert("Could not create your company");
        });
    },
    updateP(id) {
      console.log("fuckkkkk");
      let uri = "api/products/{id}/" + this.form.id;
      this.form.put("api/products/" + id).then(response => {
        this.form = response.data.products;
        console.log(this.form);
        console.log(this.form.id);
        this.$router.push({ name: "products" });
      });
      console.log("yessssssssss");
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
    loadProducts() {
      axios.get("api/products").then(({ data }) => {
        this.products = data;
        this.test = "aaaaa";
      });
    }
  },
  mounted() {
    // help to load the products after any changes like delete,edit or search
    // this.loadProducts();
    // Fire.$on("afterCreated", () => {
    //   this.loadProducts();
    // });
    // setInterval(() => this.loadProducts(), 3000);
    // }
    let app = this;
    let id = app.$route.params.id;
    app.productId = id;
    console.log(app.productId);
    axios
      .get("api/getProduct/" + id)

      .then(function(resp) {
        app.form = resp.data;
        console.log(app.form);
      })

      .catch(function() {
        alert("Could not load your data");
      });
  }
};
</script>