import config from '@/config'
import Storage from '@/utils/storage'

import {
  SIDEBAR_TYPE,
  DEFAULT_THEME,
  DEFAULT_LAYOUT_MODE,
  DEFAULT_COLOR,
  DEFAULT_COLOR_WEAK,
  DEFAULT_FIXED_HEADER,
  DEFAULT_FIXED_SIDEMENU,
  DEFAULT_FIXED_HEADER_HIDDEN,
  DEFAULT_CONTENT_WIDTH_TYPE,
  DEFAULT_LOCALE
} from '@/store/mutation-types'

export const state = {
  sidebar: Storage.get(SIDEBAR_TYPE, true),
  device: 'desktop',
  theme: Storage.get(DEFAULT_THEME, config.navTheme),
  layout: Storage.get(DEFAULT_LAYOUT_MODE, config.layout),
  contentWidth: Storage.get(DEFAULT_CONTENT_WIDTH_TYPE, config.contentWidth),
  fixedHeader: Storage.get(DEFAULT_FIXED_HEADER, config.fixedHeader),
  fixSideBar: Storage.get(DEFAULT_FIXED_SIDEMENU, config.fixSideBar),
  autoHideHeader: Storage.get(DEFAULT_FIXED_HEADER_HIDDEN, config.autoHideHeader),
  color: Storage.get(DEFAULT_COLOR, config.primaryColor),
  weak: Storage.get(DEFAULT_COLOR_WEAK, config.colorWeak),
  locale: Storage.get(DEFAULT_LOCALE, config.locale),
  isLoading: false
}

export const mutations = {
  UPDATE_LOADING_STATUS: (state, isLoading) => {
    state.isLoading = isLoading
  },
  SET_SIDEBAR_TYPE: (state, type) => {
    state.sidebar = type
    Storage.set(SIDEBAR_TYPE, type)

    console.log('SET_SIDEBAR_TYPE', type)
  },
  CLOSE_SIDEBAR: (state) => {
    Storage.set(SIDEBAR_TYPE, true)
    state.sidebar = false
  },
  TOGGLE_DEVICE: (state, device) => {
    state.device = device
  },
  TOGGLE_THEME: (state, theme) => {
    // setStore('_DEFAULT_THEME', theme)
    Storage.set(DEFAULT_THEME, theme)
    state.theme = theme
  },
  TOGGLE_LAYOUT_MODE: (state, layout) => {
    Storage.set(DEFAULT_LAYOUT_MODE, layout)
    console.log(layout)
    state.layout = layout
  },
  TOGGLE_FIXED_HEADER: (state, fixed) => {
    Storage.set(DEFAULT_FIXED_HEADER, fixed)
    state.fixedHeader = fixed
  },
  TOGGLE_FIXED_SIDEBAR: (state, fixed) => {
    Storage.set(DEFAULT_FIXED_SIDEMENU, fixed)
    state.fixSideBar = fixed
  },
  TOGGLE_FIXED_HEADER_HIDDEN: (state, show) => {
    Storage.set(DEFAULT_FIXED_HEADER_HIDDEN, show)
    state.autoHideHeader = show
  },
  TOGGLE_CONTENT_WIDTH: (state, type) => {
    Storage.set(DEFAULT_CONTENT_WIDTH_TYPE, type)
    state.contentWidth = type
  },
  TOGGLE_COLOR: (state, color) => {
    Storage.set(DEFAULT_COLOR, color)
    state.color = color
  },
  TOGGLE_WEAK: (state, flag) => {
    Storage.set(DEFAULT_COLOR_WEAK, flag)
    state.weak = flag
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
  SetSidebar ({ commit }, type) {
    commit('SET_SIDEBAR_TYPE', type)
  },
  CloseSidebar ({ commit }) {
    commit('CLOSE_SIDEBAR')
  },
  ToggleDevice ({ commit }, device) {
    commit('TOGGLE_DEVICE', device)
  },
  ToggleTheme ({ commit }, theme) {
    commit('TOGGLE_THEME', theme)
  },
  ToggleLayoutMode ({ commit }, mode) {
    commit('TOGGLE_LAYOUT_MODE', mode)
  },
  ToggleFixedHeader ({ commit }, fixedHeader) {
    if (!fixedHeader) {
      commit('TOGGLE_FIXED_HEADER_HIDDEN', false)
    }
    commit('TOGGLE_FIXED_HEADER', fixedHeader)
  },
  ToggleFixSideBar ({ commit }, fixSideBar) {
    commit('TOGGLE_FIXED_SIDEBAR', fixSideBar)
  },
  ToggleFixedHeaderHidden ({ commit }, show) {
    commit('TOGGLE_FIXED_HEADER_HIDDEN', show)
  },
  ToggleContentWidth ({ commit }, type) {
    commit('TOGGLE_CONTENT_WIDTH', type)
  },
  ToggleColor ({ commit }, color) {
    commit('TOGGLE_COLOR', color)
  },
  ToggleWeak ({ commit }, weakFlag) {
    console.log('color')
    commit('TOGGLE_WEAK', weakFlag)
  },
  SetLocale ({ commit }, locale) {
    commit('SET_LOCALE', locale)
  }
}
