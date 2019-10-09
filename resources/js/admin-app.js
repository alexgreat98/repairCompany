// window.Vue = require('vue');
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import 'material-design-icons-iconfont'

// window.Vuetify = require('vuetify');
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import VueRouter from 'vue-router';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import cyrillicToTranslit from 'cyrillic-to-translit-js';
import App from './components/AppAdmin';
import PortfolioAdmin from './components/PortfolioAdmin';
import PortfoliosAdmin from './components/PortfoliosAdmin';
import PricesAdmin from './components/PricesAdmin';
import ServicesAdmin from './components/ServicesAdmin';
import ServiceAdmin from './components/ServiceAdmin';
import ParametersAdmin from './components/ParametersAdmin';
import UsersAdmin from './components/UsersAdmin';
import axios from 'axios';
import Vuex from 'vuex'
//store

import pricesStore from './components/store/pricesStore'
import servicesStore from './components/store/servicesStore'

/*axios.defaults.headers.common = {
    'X-CSRF-TOKEN': myToken.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': 'Bearer ' + myToken.apiToken,
    'Content-Type': 'application/json',

};*/

Vue.prototype.axios = axios;
Vue.prototype.vue = Vue;
Vue.prototype.editor =  ClassicEditor;
Vue.prototype.editorConfig = {};
Vue.prototype.cyrillicToTranslit = cyrillicToTranslit;
Vue.prototype.sortList = Array.from(Array(501).keys());

Vue.use(Vuetify);
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use( CKEditor );

const opts = {
    icons: {
        iconfont: 'mdi',
    },
};
const routes = [
    {path: '/portfolios/:id', component: PortfolioAdmin},
    {path: '/portfolios', component: PortfoliosAdmin},
    {path: '/services/:id', component: ServiceAdmin},
    {path: '/services', component: ServicesAdmin},
    {path: '/prices/', component: PricesAdmin},
    {path: '/parameters', component: ParametersAdmin},
    {path: '/users', component: UsersAdmin},
];
const router = new VueRouter({
    routes // сокращённая запись для `routes: routes`
});
const store =
    {
        modules: {
            pricesStore,
            servicesStore,
        },
    };

let vm = new Vue({
    router,
    store: new Vuex.Store(store),
    vuetify: new Vuetify(opts),
    components: {ClassicEditor},
    render: h => h(App)
}).$mount('#app');
