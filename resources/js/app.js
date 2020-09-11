/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "email-form-component",
    require("./components/EmailFormComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from "vue";
import VueSweetalert2 from "vue-sweetalert2";
const options = {
    confirmButtonColor: "#7f8ff4",
    cancelButtonColor: "salmon"
};
import "sweetalert2/dist/sweetalert2.min.css";
Vue.use(VueSweetalert2, options);

import store from "./config/store";

const app = new Vue({
    store,
    el: "#app"
});
