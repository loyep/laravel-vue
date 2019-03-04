import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'

import i18n from './locales'
import importDirective from '@/directive'

// import '@/styles/index.less'

import bootstrap from './bootstrap'
import '@/permission'

Vue.config.productionTip = false

/**
 * 注册指令
 */
importDirective(Vue)

new Vue({
  router,
  i18n,
  store,
  created () {
    bootstrap()
  },
  render: h => h(App)
}).$mount('#app')
