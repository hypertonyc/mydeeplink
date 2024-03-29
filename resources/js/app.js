/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueToastr from "vue-toastr";
Vue.use(VueToastr,{
  defaultTimeout: 3000,
  defaultPosition: "toast-bottom-right"
});

Vue.component('main-page', require('./components/MainPage.vue').default);
Vue.component('main-page-profile', require('./components/main/Profile.vue').default);
Vue.component('main-page-links', require('./components/main/Links.vue').default);
Vue.component('main-page-statistics', require('./components/main/Statistics.vue').default);
Vue.component('main-page-payments', require('./components/main/Payments.vue').default);
Vue.component('main-page-tariffs', require('./components/main/Tariffs.vue').default);
Vue.component('main-page-contacts', require('./components/main/Contacts.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
