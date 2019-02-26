import { routes as constantRouterMap, asyncRouterMap } from '@/router/routes'
import { filterAsyncRouter } from '@/utils/permission'

export const state = {
  routers: [],
  addRouters: []
}

export const mutations = {
  SET_ROUTERS: (state, routers) => {
    state.addRouters = routers
    state.routers = constantRouterMap.concat(routers)
  }
}

export const actions = {
  GenerateRoutes ({ commit }, data) {
    return new Promise(resolve => {
      const { roles } = data
      let accessedRouters
      if (roles.includes('admin')) {
        accessedRouters = asyncRouterMap
      } else {
        accessedRouters = filterAsyncRouter(asyncRouterMap, roles)
      }
      commit('SET_ROUTERS', accessedRouters)
      resolve()
    })
  }
}

export const getters = {
  addRouters: state => state.addRouters,
  routers: state => state.routers
}
