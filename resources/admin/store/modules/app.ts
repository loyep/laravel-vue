import config from '@/config/index'
import { Module, MutationTree, ActionTree, GetterTree, ActionContext } from 'vuex';
import { RootState } from '@/store/index';
import Storage from '@/utils/storage'

import {
  DEFAULT_LOCALE
} from '@/store/mutation-types'

export interface IAppState {
  locale: string,
  isLoading: boolean,
}

export const state: IAppState = {
  locale: Storage.get(DEFAULT_LOCALE, config.locale),
  isLoading: false
}

export const mutations: MutationTree<IAppState> = {
  UPDATE_LOADING_STATUS: (state: IAppState, isLoading: boolean) => {
    state.isLoading = isLoading
  },
  SET_LOCALE: (state: IAppState, locale: string) => {
    Storage.set(DEFAULT_LOCALE, locale)
    state.locale = locale
  }
}

export const actions: ActionTree<IAppState, RootState> = {
  UpdateLoadingStatus (context: ActionContext<IAppState, RootState>, loading: boolean) {
    context.commit('UPDATE_LOADING_STATUS', loading)
  },
  SetLocale (context: ActionContext<IAppState, RootState>, locale: string) {
    context.commit('SET_LOCALE', locale)
  }
}

export const getters: GetterTree<IAppState, RootState> = {
  locale: state => state.locale,
  isLoading: state => state.isLoading
}

const app: Module<IAppState, RootState> = {
  namespaced: true,
  state: state,
  actions: actions,
  mutations: mutations,
  getters: getters
}

export default app;