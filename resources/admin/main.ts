import Vue from 'vue'
import App from './App.vue'
import router from './router/index'
import store from './store'
import i18n from './locales'

import importDirective from '@/directives/index'

import bootstrap from './bootstrap'

Vue.config.productionTip = false

// import '@/styles/index.less'

/**
 * 注册指令
 */
importDirective()

new Vue({
  router,
  i18n,
  store,
  created() {
    bootstrap()
  },
  render: h => h(App)
}).$mount('#app')
