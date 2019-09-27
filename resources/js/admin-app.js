window.Vue = require('vue');
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import 'material-design-icons-iconfont'
window.Vuetify = require('vuetify');
import 'vuetify/dist/vuetify.min.css'
import App from './components/AppAdmin';


Vue.use(Vuetify);

const opts = {
    icons: {
        iconfont: 'mdi',

    },
};


new Vue({
    vuetify: new Vuetify(opts),
    render: h => h(App),
}).$mount('#app');