/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// import moment from 'moment';
import * as moment from 'moment';
import VueProgressBar from 'vue-progressbar';
import Swal from 'sweetalert2';
import {
    Form,
    HasError,
    AlertError
} from 'vform' // import different packages from vue

// decleare form,hasError, AlertError in the for use in any component
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Swal = Swal;

import VueRouter from 'vue-router';
Vue.use(VueRouter);
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
});
// for toast alert 
const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;


const routes = [{
        path: '/dashboard',
        component: require('./components/Dashboard.vue').default
    },
    {
        path: '/orders',
        component: require('./components/Orders.vue').default
    },
    {
        path: '/products',
        component: require('./components/Products.vue').default
    },
    {
        path: '/delivery',
        component: require('./components/Delivery.vue').default
    },
    {
        path: '/category',
        component: require('./components/Categories.vue').default
    },
]


const router = new VueRouter({
    routes
});




window.Fire = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});


Vue.filter('upText', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
});

String.prototype.capitalize = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
}


Vue.filter('myDate', function (created) {
    return moment(created).format('MMMM Do YYYY');
});
