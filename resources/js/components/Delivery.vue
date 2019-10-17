<style>
button.page-link {
  display: inline-block;
}
button.page-link {
  font-size: 20px;
  color: #29b3ed;
  font-weight: 500;
}
.offset {
  width: 500px !important;
  margin: 20px auto;
}
</style>
<template>
  <div class="offset">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>User ID</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="p in displayedProducts" v-bind:key="p.id">
          <td>{{p.product_name}}</td>
          <td>{{p.type}}</td>
          <td>{{p.weight}}</td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
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
          <button type="button" @click="page++" v-if="page < pages.length" class="page-link">Next</button>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import JwPagination from "jw-vue-pagination";
Vue.component("jw-pagination", JwPagination);
// an example array of items to be paged
const exampleItems = [...Array(150).keys()].map(i => ({
  id: i + 1,
  name: "Item " + (i + 1)
}));

export default {
  data() {
    return {
      exampleItems,
      products: [""],
      posts: [""],
      page: 1,
      perPage: 1,
      pages: []
    };
  },
  created() {
    this.getProducts();
  },
  methods: {
    paginate(products) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return products.slice(from, to);
    },
    setPages() {
      let numberOfPages = Math.ceil(this.products.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    onChangePage(pageOfItems) {
      // update page of items
      this.pageOfItems = pageOfItems;
    },
    getProducts() {
      axios.get("api/products").then(({ data }) => {
        this.products = data;
        console.log("aaaa");
        console.log(this.products);
        this.test = "aaaaa";
      });
    }
  },
  computed: {
    displayedProducts() {
      return this.paginate(this.products);
    }
  },
  watch: {
    products() {
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
