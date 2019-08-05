<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Laravel vue pagination - ItSolutionStuff.com</div>

          <div class="card-body">
            <ul>
              <li v-for="tag in products.data" :key="tag.id">{{ tag.name }}</li>
            </ul>
            <pagination :data="products" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      //sorting
      // image: "",
      editMode: false,
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
  created() {
    this.getResults();
  },
  methods: {
    getResults(page) {
      if (typeof page === "undefined") {
        page = 1;
      }

      this.form
        .get("/products?page=" + page)
        .then(response => {
          return response.data.json();
        })
        .then(data => {
          this.products = data;
        });
    }
  }
};
</script>