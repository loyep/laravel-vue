import Vue from 'vue'
import App from './App'
// import router from './router'
import store from './store'
import i18n from './locales'
import AntDesign from 'ant-design-vue'

// import importDirective from '@/directives'

import bootstrap from './bootstrap'

Vue.config.productionTip = false;

Vue.use(AntDesign);

/**
 * 注册指令
 */
importDirective()

const app = new Vue({
  // router,
  // i18n,
  // store,
  created () {
    // bootstrap()
  },
  render: h => h(App)
}).$mount('#app')

export default app
