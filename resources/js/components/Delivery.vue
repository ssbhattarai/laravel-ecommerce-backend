<template>
  <div>
    <div class="container form-control">
      hy:
      <input type="text" v-model.lazy="keywords" v-debounce="100" />
      <!--<ul v-if="results.length > 0">
        <li v-for="result in results" :key="result.id" v-text="result.product_name"></li>
        <li v-for="result in results" :key="result.id" v-text="result.type"></li>
        <li v-for="result in results" :key="result.id" v-text="result.weight"></li>
        <li v-for="result in results" :key="result.id" v-text="result.weight_type"></li>
        <li v-for="result in results" :key="result.id" v-text="result.image"></li>
        <li v-for="result in results" :key="result.id" v-text="result.description"></li>
      </ul>-->
    </div>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">product Name</th>
          <th scope="col">type</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="result in results" :key="result.id">
          <th scope="row" v-text="result.id"></th>
          <td v-text="result.product_name"></td>
          <td v-text="result.type"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      keywords: null,
      results: [],
      products: []
    };
  },

  watch: {
    keywords(after, before) {
      this.fetch();
    }
  },
  created() {
    this.loadProducts();
  },
  methods: {
    fetch() {
      axios
        .get("/api/searchP", { params: { keywords: this.keywords } })
        .then(response => (this.results = response.data))
        .catch(error => {});
    },
    loadProducts() {
      axios.get("api/products").then(data => {
        this.products = data.data;
        console.log(this.products);
      });
    }
  }
};
</script>