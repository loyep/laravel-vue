
import Vue from 'vue'
import App from './App';

// 配置
// import Setting from '@/setting';

import request from './utils/request'
import ElementUI from 'element-ui'
// store
import store from '@admin/store';
// 菜单和路由
import router from './router';

Vue.use(request);

Vue.use(ElementUI);

const app = new Vue({
  router,
  store,
  watch: {
    // 监听路由 控制侧边栏显示 标记当前顶栏菜单（如需要）
    '$route' (to, from) {
        // const path = to.path;
        // if (!Setting.dynamicSiderMenu) {
        //     const headerName = getHeaderName(path, menuSider);
        //     // 在 404 时，是没有 headerName 的
        //     if (headerName !== null) {
        //         this.$store.commit('menu/setHeaderName', headerName);

        //         const filterMenuSider = getMenuSider(menuSider, headerName);
        //         this.$store.commit('menu/setSider', filterMenuSider);
        //         this.$store.commit('menu/setActivePath', path);

        //         const openNames = getSiderSubmenu(path, menuSider);
        //         this.$store.commit('menu/setOpenNames', openNames);
        //     }
        // }
        // this.appRouteChange(to, from);
    }
  },
  created () {
    // 初始化全屏监听
    this.$http.get('api/me').then(res => {
      this.$store.commit('user/set', res.user)
    })
    this.$store.dispatch('layout/listenFullscreen')
  },
  render: h => h(App)
}).$mount('#app')

export default app
