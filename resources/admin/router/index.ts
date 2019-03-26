import Vue from 'vue'
import store from '@/store'
import Router, {Route, NavigationGuard} from 'vue-router'
import routes from './routes'
import { getBaseUrl } from '@/utils/utils'
import { sync } from 'vuex-router-sync'
import NProgress from 'nprogress'
import { getToken } from '@/utils/auth'
import { notification } from 'ant-design-vue'
import { whiteList } from '@/config/route'

NProgress.configure({ showSpinner: false })

Vue.use(Router)

const router = createRouter(getBaseUrl())

const beforeResolve: NavigationGuard = async (to: Route, from: Route, next: any) => {
  NProgress.start()
  if (getToken()) {
    if (whiteList.indexOf(to.path) !== -1) {
      next({ path: '/' })
      NProgress.done()
    } else {
      if (store.getters['auth/roles'].length === 0) {
        store
          .dispatch('auth/GetInfo')
          .then(response => {
            const roles = response.data.roles
            store
              .dispatch('permission/GenerateRoutes', { roles })
              .then(() => {
                router.addRoutes(store.getters['permission/addRouters'])
                next({ ...to, replace: true })
              })
          }).catch((error) => {
            notification.error({
              message: '错误',
              description: error.response.data.message
            })
            store
              .dispatch('auth/Logout')
              .then(() => {
                location.reload()
              })
          })
      } else {
        next()
      }
    }
  } else {
    if (whiteList.indexOf(to.path) !== -1) {
      next()
    } else {
      next({ path: '/login', query: { redirect: to.fullPath } })
      NProgress.done()
    }
  }
}

const afterEach: (to: Route, from: Route) => void = async (to: Route, from: Route) => {
  await router.app.$nextTick()
  NProgress.done()
}

router.beforeResolve(beforeResolve)
router.afterEach(afterEach)

sync(store, router)

export default router

function scrollBehavior (to: Route, from: Route, savedPosition: any) : any {
  if (savedPosition) {
    return savedPosition
  }

  if (to.hash) {
    return { selector: to.hash }
  }

  const [component]: Array<any> = router.getMatchedComponents({ ...to }).slice(-1)

  if (component && component.scrollToTop === false) {
    return {}
  }

  return { x: 0, y: 0 }
}




/**
 * The router factory
 */
function createRouter (base: string) : Router {
  const router = new Router({
    base,
    scrollBehavior,
    // mode: 'history',
    routes
  })

  return router
}
