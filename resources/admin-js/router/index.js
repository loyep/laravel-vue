import Vue from 'vue'
import store from '@/store'
import Router from 'vue-router'
import routes from './routes'
import { getBaseUrl } from '@/utils/utils'
import { beforeEach, afterEach } from './permission'
import { sync } from 'vuex-router-sync'

Vue.use(Router)

const router = createRouter({ base: getBaseUrl() })

sync(store, router)

export default router

/**
 * The router factory
 */
function createRouter ({ base }) {
  const router = new Router({
    base,
    scrollBehavior,
    // mode: 'history',
    routes
  })

  router.beforeEach(beforeEach)
  router.afterEach(afterEach)

  return router
}

/**
 * Scroll Behavior
 *
 * @link https://router.vuejs.org/en/advanced/scroll-behavior.html
 *
 * @param  {Route} to
 * @param  {Route} from
 * @param  {Object|undefined} savedPosition
 * @return {Object}
 */
function scrollBehavior (to, from, savedPosition) {
  if (savedPosition) {
    return savedPosition
  }

  if (to.hash) {
    return { selector: to.hash }
  }

  const [component] = router.getMatchedComponents({ ...to }).slice(-1)

  if (component && component.scrollToTop === false) {
    return {}
  }

  return { x: 0, y: 0 }
}
