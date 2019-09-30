window.Vue = require('vue');
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import 'material-design-icons-iconfont'

window.Vuetify = require('vuetify');
import 'vuetify/dist/vuetify.min.css'
import VueRouter from 'vue-router';
import App from './components/AppAdmin';
import PortfolioAdmin from './components/PortfolioAdmin';
import PortfoliosAdmin from './components/PortfoliosAdmin';
import PricesAdmin from './components/PricesAdmin';
import ServicesAdmin from './components/ServicesAdmin';
import ServiceAdmin from './components/ServiceAdmin';
import ParametersAdmin from './components/ParametersAdmin';


Vue.use(Vuetify);

const opts = {
    icons: {
        iconfont: 'mdi',
    },
};
const routes = [
    {path: '/portfolio/:id', component: PortfolioAdmin},
    {path: '/portfolio', component: PortfoliosAdmin},
    {path: '/services/:id', component: ServiceAdmin},
    {path: '/services', component: ServicesAdmin},
    {path: '/prices/', component: PricesAdmin},
    {path: '/parameters', component: ParametersAdmin},
];
const router = new VueRouter({
    routes // сокращённая запись для `routes: routes`
});
Vue.use(VueRouter);

new Vue({
    router,
    vuetify: new Vuetify(opts),
    render: h => h(App),
}).$mount('#app');