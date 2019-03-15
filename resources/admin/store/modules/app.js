import config from '@/config'
import Storage from '@/utils/storage'

import {
  DEFAULT_LOCALE
} from '@/store/mutation-types'

export const state = {
  locale: Storage.get(DEFAULT_LOCALE, config.locale),
  isLoading: false
}

export const mutations = {
  UPDATE_LOADING_STATUS: (state, isLoading) => {
    state.isLoading = isLoading
  },
  SET_LOCALE: (state, locale) => {
    Storage.set(DEFAULT_LOCALE, locale)
    state.locale = locale
  }
}

export const actions = {
  UpdateLoadingStatus ({ commit }, loading) {
    commit('UPDATE_LOADING_STATUS', loading)
  },
  SetLocale ({ commit }, locale) {
    commit('SET_LOCALE', locale)
  }
}

export const getters = {
  locale: state => state.locale,
  isLoading: state => state.isLoading
}
