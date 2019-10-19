import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import Vue from 'vue'
import Vuetify from 'vuetify'
import axios from 'axios';
import Swiper from 'swiper';
import Vuelidate from 'vuelidate'
import {validationMixin} from 'vuelidate'
import PricesClient from './components/PricesClient'
import CallbackClient from './components/CallbackClient'
import callbackStore from './components/store/clientCallbackStore'
import Vuex from 'vuex'
import 'fslightbox/fslightbox.min.js'
import colors from 'vuetify/lib/util/colors'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuelidate);
Vue.use(Vuetify);
Vue.use(Vuex);
Vue.prototype.axios = axios;


const opts = {
    icons: {
        iconfont: 'mdi',
    },
    theme: {
        themes: {
            light: {
                primary: colors.red.darken1, // #E53935
                secondary: colors.red.lighten4, // #FFCDD2
                accent: colors.indigo.base, // #3F51B5
            },
        },
    },
};
const store =
    {
        modules: {
            callbackStore,
        },
    };
const app = new Vue({
    store: new Vuex.Store(store),
    mixins: [validationMixin],
    vuetify: new Vuetify(opts),
    components: {
        PricesClient,
        CallbackClient
    },
}).$mount('#app');

new Swiper('.services-portfolio-slider', {

    spaceBetween: 30,
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 3,
    grabCursor: true,
    centeredSlides: true,
    effect: 'coverflow',
    breakpoints: {
        0: {
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            slidesPerView: 1,
            centeredSlides: false,
        },
        576: {
            slidesPerView: 3,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
        }
    }
});
new Swiper('.index_banner', {
    pagination: {
        clickable: true,
        el: '.swiper-pagination',
    },
});
new Swiper('.index_banner_parallax', {
    speed: 600,
    parallax: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});


document.querySelectorAll('img[data-src]')
    .forEach(e => {
        e.setAttribute('src', e.dataset.src);
        e.removeAttribute('data-src');
    });

window.addEventListener('scroll', () => {
    scrollMenu()
});
let nav_bar_scroll = document.getElementById('nav_bar_scroll');

function scrollMenu() {
    if (document.body.scrollTop > 4 || document.documentElement.scrollTop > 4) {
        nav_bar_scroll.classList.add('scroll')

    } else {
        nav_bar_scroll.classList.remove('scroll')

    }
}

if (nav_bar_scroll.classList.contains('index_page')) {
    window.addEventListener('scroll', () => {
        scrollMenuIndex()
    });
}

function scrollMenuIndex() {
    if (document.body.scrollTop > (window.innerHeight - 50) || document.documentElement.scrollTop > (window.innerHeight - 50)) {
        nav_bar_scroll.classList.remove('index_scroll')
    } else {
        nav_bar_scroll.classList.add('index_scroll')
    }
}


let menuBtn = document.querySelector('.navbar-toggler');
if (menuBtn) {
    menuBtn.addEventListener('click', () => {
        document.querySelector('#navbarSupportedContent').classList.toggle('show')
    })
}
