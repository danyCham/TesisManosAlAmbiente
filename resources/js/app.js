 
import VuePaginate from 'vue-paginate';

require('./bootstrap');

window.$ = window.jQuery = require('jquery'); 

window.Vue = require('vue');

Vue.use(VuePaginate);
Vue.component('usuario',require('./components/Usuario.vue').default);
Vue.component('artista',require('./components/Artista.vue').default);
/**
 const app para compilar los archivos vueJs
 */

const app = new Vue({
    el: '#app',
});
