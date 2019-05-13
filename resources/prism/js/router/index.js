import store from '@/store'
import Router from 'vue-router'
import routes from './routes'
import NProgress from 'nprogress'

const router = createRouter({base: window.config.base})

router.beforeResolve(beforeResolve)
router.afterEach(afterEach)

export default router

async function beforeResolve(to, from, next) {
  NProgress.start()
}

async function afterEach(to, from, next) {
  await router.app.$nextTick()
  NProgress.done()
}

function scrollBehavior(to, from, savedPosition) {
  if (savedPosition) {
    return savedPosition
  }

  if (to.hash) {
    return {selector: to.hash}
  }

  const [component] = router.getMatchedComponents({...to}).slice(-1)

  if (component && component.scrollToTop === false) {
    return {}
  }

  return {x: 0, y: 0}
}

/**
 * The router factory
 */
function createRouter(base) {
  const router = new Router({
    base,
    scrollBehavior,
    mode: 'history',
    routes,
  })

  return router
}
