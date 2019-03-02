import router from './router'
import store from './store'
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'
import { getToken } from '@/utils/auth'
import { notification } from 'ant-design-vue'
import { whiteList } from '@/config/route'

NProgress.configure({ showSpinner: false })

router.beforeEach((to, from, next) => {
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
                const redirect = decodeURIComponent(from.query.redirect || to.path)
                if (to.path === redirect) {
                  next({ ...to, replace: true })
                } else {
                  next({ path: redirect })
                }
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
      next('/login?redirect=' + to.path) // 否则全部重定向到登录页
      NProgress.done()
    }
  }
})

router.afterEach(() => {
  NProgress.done()
})
