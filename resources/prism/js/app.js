import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import i18n from './locales'

import bootstrap from './bootstrap'

Vue.config.productionTip = false

const app = new Vue({
  router,
  i18n,
  store,
  created () {
    bootstrap()
  },
  render: h => h(App)
}).$mount('#app')

export default app
