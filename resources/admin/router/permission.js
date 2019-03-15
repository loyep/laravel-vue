import router from './index'
import store from '@/store'
import NProgress from 'nprogress'

import { getToken } from '@/utils/auth'
import { notification } from 'ant-design-vue'
import { whiteList } from '@/config/route'

NProgress.configure({ showSpinner: false })

export const beforeEach = (to, from, next) => {
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

export const afterEach = (to, from) => {
  NProgress.done()
}
