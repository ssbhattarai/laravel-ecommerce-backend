<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{products.length}}</h3>

            <p>Total Available Products</p>
            <smaller>available only</smaller>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <router-link to="/products" class="small-box-footer">
            More info
            <i class="fas fa-arrow-circle-right"></i>
          </router-link>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6" v-for="producttype in productCount" :key="producttype.type">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{producttype.count}}</h3>

            <p>{{producttype.type | upText}}</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <router-link to="/products" class="small-box-footer">
            More info
            <i class="fas fa-arrow-circle-right"></i>
          </router-link>
        </div>
      </div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
import { close } from "fs";
import { Line } from "vue-chartjs";
export default {
  extends: Line,
  data() {
    return {
      productCount: {},
      editMode: false,
      products: {},
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
    countP() {
      let uri = "api/countProduct";
      axios
        .get(uri)
        .then(data => {
          this.productCount = data.data;
          console.log(this.productCount);
        })
        .catch(() => {
          console.log("error");
        });
    },
    loadProducts() {
      axios.get("api/products").then(({ data }) => (this.products = data));
    }
  },
  created() {
    this.countP();
    this.loadProducts();
  }
};
</script>
