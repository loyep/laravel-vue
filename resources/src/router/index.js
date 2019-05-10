import Vue from 'vue'
import Router from 'vue-router'
import { constantRouterMap } from '@/config/router.config'

Vue.use(Router)
function getRouteBase () {
  let base = '/'
  let Base = process.env.MIX_ADMIN_BASE
  console.log(Base)
  if (Base !== undefined || Base !== '') {
    base += Base + '/'
  }
  return base
}

export default new Router({
  mode: 'history',
  base: getRouteBase(),
  scrollBehavior: () => ({ y: 0 }),
  routes: constantRouterMap
})
