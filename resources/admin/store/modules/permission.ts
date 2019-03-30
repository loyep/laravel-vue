import { routes as constantRouterMap, asyncRouterMap } from '@/router/routes';
import { filterAsyncRouter } from '@/utils/permission';
import { Module, MutationTree, ActionTree, GetterTree, ActionContext } from 'vuex';
import { RootState } from '@/store/index';

export interface IPermissionState {
  routers: any,
  addRouters: any
}

export const state: IPermissionState = {
  routers: [],
  addRouters: []
}

export const mutations: MutationTree<IPermissionState> = {
  SET_ROUTERS: (state: IPermissionState, routers: any) => {
    state.addRouters = routers
    state.routers = constantRouterMap.concat(routers)
  }
}

export const actions: ActionTree<IPermissionState, RootState> = {
  GenerateRoutes (context: ActionContext<IPermissionState, RootState>, data: any) {
    return new Promise(resolve => {
      
      const { roles } = data
      
      let accessedRouters: any

      if (roles.includes('admin')) {
        accessedRouters = asyncRouterMap
      } else {
        accessedRouters = filterAsyncRouter(asyncRouterMap, roles)
      }
      
      context.commit('SET_ROUTERS', accessedRouters)
      
      resolve()
    })
  }
}

export const getters: GetterTree<IPermissionState, RootState> = {
  addRouters: state => state.addRouters,
  routers: state => state.routers
}

const permission: Module<IPermissionState, RootState> = {
  namespaced: true,
  state: state,
  actions: actions,
  mutations: mutations,
  getters: getters
}

export default permission;