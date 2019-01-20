window.Vue = require('vue');

Vue.component('test', require('./components/test.vue'));

const app = new Vue({
  el: '#app'
});