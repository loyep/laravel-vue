import router from './router'
import store from './store'
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'
import { getToken } from '@/utils/auth'
import { notification } from 'ant-design-vue'
import { whiteList } from '@/config/route'

NProgress.configure({ showSpinner: false })

const redirectRoute = (to, from, next) => {
  const redirect = decodeURIComponent(from.query.redirect || to.path)
  if (to.path === redirect) {
    // hack方法 确保addRoutes已完成 ,set the replace: true so the navigation will not leave a history record
    next({ ...to, replace: true })
  } else {
    // 跳转到目的路由
    next({ path: redirect })
  }
}

const beforeEach = (to, from, next) => {
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
                // redirectRoute(to, from, next)
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
                next({ path: '/login' })
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

const afterEach = () => {
  NProgress.done()
}

router.beforeEach(beforeEach)

router.afterEach(afterEach)
