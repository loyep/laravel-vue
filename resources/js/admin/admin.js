
import Vue from 'vue'
import App from './App';

// 配置
import Setting from '@/setting';

import ElementUI from 'element-ui'
// store
import store from '@admin/store';
// 菜单和路由
import router from './router';

Vue.use(ElementUI);

const app = new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')

export default app
