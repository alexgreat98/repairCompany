// window.Vue = require('vue');
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import 'material-design-icons-iconfont'

// window.Vuetify = require('vuetify');
import Vue from 'vue'
import Vuetify from 'vuetify'
import Vuelidate from 'vuelidate'
import VueRouter from 'vue-router';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import cyrillicToTranslit from 'cyrillic-to-translit-js';
import App from './components/AppAdmin';
import PortfoliosAdmin from './components/PortfoliosAdmin';
import CallbackAdmin from './components/CallbackAdmin';
import PricesAdmin from './components/PricesAdmin';
import ServicesAdmin from './components/ServicesAdmin';
import ParametersAdmin from './components/ParametersAdmin';
import UsersAdmin from './components/UsersAdmin';
import axios from 'axios';
import Vuex from 'vuex'
import 'vuetify/dist/vuetify.min.css'
//store

import pricesStore from './components/store/pricesStore'
import servicesStore from './components/store/servicesStore'
import callbackStore from './components/store/callbackStore'

axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.csrf_token,
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': 'Bearer ' + window.api_token,
    'Content-Type': 'application/json',

};

function onAxiosResponseRejected(error){
    vm.$data.errorsSnackbar = true;
    vm.$data.errorsSnackbarText = (error.response.status === 403)?
        'У вас нет прав для этого дествия':
        'Ошибка сервера'

}
// Add a response interceptor
axios.interceptors.response.use(function (response) {
    // Any status code that lie within the range of 2xx cause this function to trigger
    // Do something with response data
    return response;
}, function (error) {
    // Any status codes that falls outside the range of 2xx cause this function to trigger
    // Do something with response error
    return onAxiosResponseRejected(error);
});
Vue.prototype.axios = axios;
Vue.prototype.vue = Vue;
Vue.prototype.editor = ClassicEditor;
Vue.prototype.editorConfig = {};
Vue.prototype.cyrillicToTranslit = cyrillicToTranslit;
Vue.prototype.sortList = Array.from(Array(501).keys());

Vue.use(Vuetify);
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(CKEditor);
Vue.use(Vuelidate);

const opts = {
    icons: {
        iconfont: 'mdi',
    },
};
const routes = [
    {path: '/portfolios', component: PortfoliosAdmin},
    {path: '/services', component: ServicesAdmin},
    {path: '/callback', component: CallbackAdmin},
    {path: '/prices', component: PricesAdmin},
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
            callbackStore
        },
    };

let vm = new Vue({
    router,
    store: new Vuex.Store(store),
    vuetify: new Vuetify(opts),
    components: {ClassicEditor},
    data: {
        errorsSnackbar: false,
        errorsSnackbarText: null
    },
    render: h => h(App)
}).$mount('#app');
