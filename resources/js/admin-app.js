
import Vue from 'vue';
import Vuetify from 'vuetify';

import "vuetify/dist/vuetify.min.css";
import 'material-design-icons-iconfont/dist/material-design-icons.css'
//console.log(Vuetify);

import App from './App-admin';
Vue.use(Vuetify, {
    iconfont: 'mdi'
});

new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components:{
        App
    },
    template: '<App/>',
    data: () => ({
        drawer: null
    })
});