/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'

import request from './utils/request'
import router from './router'

import SignIn from '@app/components/SignIn.vue'
import SignOut from '@app/components/SignOut.vue'
import LikeLink from '@app/components/LikeLink.vue'
import CommentForm from '@app/components/CommentForm.vue'
import SearchLink from '@app/components/SearchLink.vue'

// Element UI
require('./element')

Vue.use(request);

const jQuery = window.$ = require('jquery');

Vue.config.productionTip = false

const app = new Vue({
  components: {
    SignIn,
    SignOut,
    LikeLink,
    CommentForm,
    SearchLink
  },
  router,
  data () {
    return {
    }
  },
  mounted () {

  },
  methods: {
  }
}).$mount('#app')

window.event = event

export default app

jQuery(document).ready(($) => {
  $(window).on('scroll', () => {
    var b = $(window).scrollTop();
    if (b > 72) {
      $('.fixed-top').addClass('scroll');
    } else {
      $('.fixed-top').removeClass('scroll');
    }
  });
})
