
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('back-to-top', require('./components/BackToTop').default);
Vue.component('home-notice', require('./components/HomeNotice').default);
// Vue.component('search-popup', require('./components/SearchPopup').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

import { prPopup } from './popup'

function scrollTop() {
    var $window = $(window),
        $window_width = $window.width(),
        $window_height = $window.height(),
        scroll = $window.scrollTop(),
        startPoint = $window_height / 2,
        scrTopBtn = $("#nice-back-to-top");
    if (scroll >= startPoint && $window_width >= 1024) {
        scrTopBtn.addClass('active');
    } else {
        scrTopBtn.removeClass('active');
    }
    scrTopBtn.on("click", function () {
        $("html, body").stop().animate({
            scrollTop: 0
        }, 600);
    });
};

$(document).scroll(function ($) {
    scrollTop()
});

$(window).ready(function ($) {
    $(".main-menu li:has(>ul)").addClass("has-children");
    if ($(".main-menu li").hasClass("has-children")) {
        $(".main-menu li.has-children>a").prepend('<span class="sub-menu-icon text-xs iconfont icon-sub-menu"></span>')
    };

    $(".search-popup").bind('click', function () {
        var $search = $('#search-popup-wrap')
        prPopup('full', $search.html())
    });
});
