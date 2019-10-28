/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'

// Element UI
import Element from 'element-ui'

import request from './utils/request'

import router from './router'

import SignIn from '@app/components/SignIn.vue'
import SignOut from '@app/components/SignOut.vue'
import LikeLink from '@app/components/LikeLink.vue'
import CommentForm from '@app/components/CommentForm.vue'
import SearchLink from '@app/components/SearchLink.vue'

Vue.use(request);

Vue.use(Element);

window.$ = require('jquery');

Vue.config.productionTip = false

const event = new Vue();

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
      event: event
    }
  },
  mounted () {
  },
  methods: {
  }
}).$mount('#app')

window.event = event

export default app
