 
import VuePaginate from 'vue-paginate';
import AxiosPlugin from 'vue-axios-cors';

require('./bootstrap');

window.$ = window.jQuery = require('jquery'); 

window.Vue = require('vue');

Vue.use(VuePaginate);
Vue.use(AxiosPlugin);
Vue.component('usuario',require('./components/Usuario.vue').default);

/**
 const app para compilar los archivos vueJs
 */

const app = new Vue({
    el: '#app',
});
