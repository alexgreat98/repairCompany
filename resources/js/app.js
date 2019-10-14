/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');
import Swiper from 'swiper';
import 'fslightbox/fslightbox.min.js'

// import Vuetify from 'vuetify/lib'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
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
    if (document.body.scrollTop > (window.innerHeight -50) || document.documentElement.scrollTop > (window.innerHeight -50)) {
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
