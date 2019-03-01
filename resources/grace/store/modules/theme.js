import config from '@/config'
import Cookie from '@/utils/cookie'

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
  sidebar: Cookie.get(SIDEBAR_TYPE, true),
  device: 'desktop',
  theme: Cookie.get(DEFAULT_THEME, config.navTheme),
  layout: Cookie.get(DEFAULT_LAYOUT_MODE, config.layout),
  contentWidth: Cookie.get(DEFAULT_CONTENT_WIDTH_TYPE, config.contentWidth),
  fixedHeader: Cookie.get(DEFAULT_FIXED_HEADER, config.fixedHeader),
  fixSideBar: Cookie.get(DEFAULT_FIXED_SIDEMENU, config.fixSideBar),
  autoHideHeader: Cookie.get(DEFAULT_FIXED_HEADER_HIDDEN, config.autoHideHeader),
  color: Cookie.get(DEFAULT_COLOR, config.primaryColor),
  weak: Cookie.get(DEFAULT_COLOR_WEAK, config.colorWeak),
  locale: Cookie.get(DEFAULT_LOCALE, config.locale),
  isLoading: false
}

export const mutations = {
  UPDATE_LOADING_STATUS: (state, isLoading) => {
    state.isLoading = isLoading
  },
  SET_SIDEBAR_TYPE: (state, type) => {
    state.sidebar = type
    Cookie.set(SIDEBAR_TYPE, type)

    console.log('SET_SIDEBAR_TYPE', type)
  },
  CLOSE_SIDEBAR: (state) => {
    Cookie.set(SIDEBAR_TYPE, true)
    state.sidebar = false
  },
  TOGGLE_DEVICE: (state, device) => {
    state.device = device
  },
  TOGGLE_THEME: (state, theme) => {
    // setStore('_DEFAULT_THEME', theme)
    Cookie.set(DEFAULT_THEME, theme)
    state.theme = theme
  },
  TOGGLE_LAYOUT_MODE: (state, layout) => {
    Cookie.set(DEFAULT_LAYOUT_MODE, layout)
    console.log(layout)
    state.layout = layout
  },
  TOGGLE_FIXED_HEADER: (state, fixed) => {
    Cookie.set(DEFAULT_FIXED_HEADER, fixed)
    state.fixedHeader = fixed
  },
  TOGGLE_FIXED_SIDEBAR: (state, fixed) => {
    Cookie.set(DEFAULT_FIXED_SIDEMENU, fixed)
    state.fixSideBar = fixed
  },
  TOGGLE_FIXED_HEADER_HIDDEN: (state, show) => {
    Cookie.set(DEFAULT_FIXED_HEADER_HIDDEN, show)
    state.autoHideHeader = show
  },
  TOGGLE_CONTENT_WIDTH: (state, type) => {
    Cookie.set(DEFAULT_CONTENT_WIDTH_TYPE, type)
    state.contentWidth = type
  },
  TOGGLE_COLOR: (state, color) => {
    Cookie.set(DEFAULT_COLOR, color)
    state.color = color
  },
  TOGGLE_WEAK: (state, flag) => {
    Cookie.set(DEFAULT_COLOR_WEAK, flag)
    state.weak = flag
  },
  SET_LOCALE: (state, locale) => {
    Cookie.set(DEFAULT_LOCALE, locale)
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
