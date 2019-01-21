import TableOfContents from './components/TableOfContents.vue';

window.Vue = require('vue');

Vue.component('table-of-contents', require('./components/TableOfContents.vue'));

const app = new Vue({
	components: {
	    TableOfContents,
	},
	el: '#app'
});