import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import i18n from './locales'

import importDirective from '@/directives'

import bootstrap from './bootstrap'

Vue.config.productionTip = false

// import '@/styles/index.less'

/**
 * 注册指令
 */
importDirective()

const app = new Vue({
  router,
  i18n,
  store,
  created() {
    bootstrap()
  },
  render: h => h(App)
}).$mount('#app')

export default app