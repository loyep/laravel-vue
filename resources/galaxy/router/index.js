import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes'
import { getBaseUrl } from '@/utils/utils'
// import store from '@/store'

Vue.use(Router)

const router = createRouter({ base: getBaseUrl() })

export default router

/**
 * The router factory
 */
function createRouter ({ base }) {
  return new Router({
    base,
    scrollBehavior,
    // mode: 'history',
    routes
  })
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
