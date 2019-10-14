/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
/*jshint esversion: 6 */
// import store from './store/index';



require("./bootstrap");
window.Vue = require("vue");
// import moment from 'moment';
// import 'vue-material/dist/vue-material.min.css';
// import 'vue-material/dist/theme/default.css';
import * as moment from "moment";
import VueProgressBar from "vue-progressbar";
import Swal from "sweetalert2";
import {
  Form,
  HasError,
  AlertError
} from "vform"; // import different packages from vue

//Essential js
import {
  GridPlugin,
  Page,
  Sort
} from '@syncfusion/ej2-vue-grids';
import {
  ButtonPlugin
} from "@syncfusion/ej2-vue-buttons";
import {
  enableRipple
} from "@syncfusion/ej2-base";
import {
  AutoCompletePlugin
} from '@syncfusion/ej2-vue-dropdowns';

Vue.use(AutoCompletePlugin);
enableRipple(true);
Vue.use(ButtonPlugin, Page, Sort);
Vue.use(GridPlugin);



// decleare form,hasError, AlertError in the for use in any component
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component("pagination", require("laravel-vue-pagination"));

window.Swal = Swal;
window.Fire = new Vue();
import VueRouter from "vue-router";
Vue.use(VueRouter);

import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

import SortedTablePlugin from "vue-sorted-table";

Vue.use(SortedTablePlugin);

// pagination package 
// import JwPagination from 'jw-vue-pagination';
// Vue.component('jw-pagination', JwPagination);

Vue.use(VueProgressBar, {
  color: "rgb(143, 255, 199)",
  failedColor: "red",
  height: "4px"
});


import Vue from 'vue'
// for toast alert
const Toast = Swal.mixin({
  toast: true,
  position: "top",
  showConfirmButton: false,
  timer: 3000
});
window.Toast = Toast;
// Vue Routes

const routes = [{
    path: "/",
    component: require("./components/Dashboard.vue").default
  },
  {
    path: "/orders",
    name: "orders",
    component: require("./components/Orders.vue").default
  },
  {
    path: "/products",
    name: "products",
    component: require("./components/product/Products.vue").default
  },
  {
    path: "/delivery",
    name: "delivery",
    component: require("./components/Delivery.vue").default
  },
  {
    path: "/category",
    name: "category",
    component: require("./components/Categories.vue").default
  },
  {
    path: "/developer",
    component: require("./components/Developer.vue").default
  },
  {
    path: "/profile",
    name: "profile",
    component: require("./components/Profile.vue").default
  },
  {
    path: "/",
    name: "dash",
    component: require("./components/Dashboard.vue").default
  },
  {
    path: "/chat",
    name: "chat",
    component: require("./components/Chat.vue").default
  },
  {
    path: "/create-products",
    name: "create",
    component: require("./components/product/CreateProduct.vue").default
  },
  {
    path: "/products/:id",
    name: "update",
    component: require("./components/product/UpdateProduct.vue").default
  }, {
    path: "/suppliers",
    name: "suppliers",
    component: require("./components/supplier/supplier.vue").default
  },
  {
    path: "/create-supplier",
    name: "c-supplier",
    component: require("./components/supplier/create-supplier.vue").default
  },
  {
    path: "/suppliers/:id",
    name: "u-supplier",
    component: require("./components/supplier/update-supplier.vue").default
  },


];

const router = new VueRouter({
  routes
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component(
  "example-component",
  require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
  el: "#app",
  router,
  data: {
    search: ""
  },
  methods: {
    // working but delay for 1 sec
    searchit: _.debounce(() => {
      Fire.$emit("searching");
    }, 500)
    // searchit() {
    //     Fire.$emit("searching");
    // },
  }
});

Vue.filter("upText", function (text) {
  if (text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
  } else {
    return "";
  }
});

String.prototype.capitalize = function () {
  return this.charAt(0).toUpperCase() + this.slice(1);
};

Vue.filter("myDate", function (created) {
  return moment(created).format("MMMM Do YYYY");
});

// this is for the passport
Vue.component(
  "passport-clients",
  require("./components/passport/Clients.vue").default
);

Vue.component(
  "passport-authorized-clients",
  require("./components/passport/AuthorizedClients.vue").default
);

Vue.component(
  "passport-personal-access-tokens",
  require("./components/passport/PersonalAccessTokens.vue").default
);

window.Vue = require("vue");
Vue.use(require("vue-resource"));

Vue.component('pagination', require('laravel-vue-pagination'));




import BootstrapVue from 'bootstrap-vue';
// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap-vue/dist/bootstrap-vue.css';
Vue.use(BootstrapVue);

// import Chart from 'chart.js';
// Vue.use(Chart);

// This imports the dropdown and table plugins
import {
  DropdownPlugin,
  TablePlugin
} from 'bootstrap-vue';
Vue.use(DropdownPlugin);
Vue.use(TablePlugin);


import {
  PaginationPlugin
} from 'bootstrap-vue';
Vue.use(PaginationPlugin);

import Vuex from 'vuex'

Vue.use(Vuex)

// console.log(2+5);
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'



// import Vue from 'vue';
// import Vuetify from 'vuetify';
// import 'vuetify/dist/vuetify.min.css';

// Vue.use(Vuetify);

import Vuetify from 'vuetify/lib';

Vue.use(Vuetify);

import VDataTable from 'vuetify';
Vue.use(VDataTable);
