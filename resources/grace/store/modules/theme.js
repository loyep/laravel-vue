import config from '@/config'
import Storage from '@/utils/storage'
import { SCREEN_TYPE } from '@/utils/device'

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
  CONTENT_WIDTH_TYPE
} from '@/store/mutation-types'

export const state = {
  sidebar: Storage.get(SIDEBAR_TYPE, true),
  device: 'desktop',
  theme: Storage.get(DEFAULT_THEME, config.navTheme),
  layout: Storage.get(DEFAULT_LAYOUT_MODE, config.layout),
  contentWidth: Storage.get(DEFAULT_CONTENT_WIDTH_TYPE, config.contentWidth),
  fixedHeader: Storage.get(DEFAULT_FIXED_HEADER, config.fixedHeader),
  fixSidebar: Storage.get(DEFAULT_FIXED_SIDEMENU, config.fixSidebar),
  autoHideHeader: Storage.get(DEFAULT_FIXED_HEADER_HIDDEN, config.autoHideHeader),
  color: Storage.get(DEFAULT_COLOR, config.primaryColor),
  weak: Storage.get(DEFAULT_COLOR_WEAK, config.colorWeak),
  screen: 'screen-lg'
}

export const mutations = {
  SET_SIDEBAR_TYPE: (state, type) => {
    Storage.set(SIDEBAR_TYPE, type)
    state.sidebar = type
  },
  CLOSE_SIDEBAR: (state) => {
    Storage.set(SIDEBAR_TYPE, true)
    state.sidebar = false
  },
  TOGGLE_DEVICE: (state, device) => {
    state.device = device
  },
  TOGGLE_THEME: (state, theme) => {
    Storage.set(DEFAULT_THEME, theme)
    state.theme = theme
  },
  TOGGLE_LAYOUT_MODE: (state, layout) => {
    Storage.set(DEFAULT_LAYOUT_MODE, layout)
    state.layout = layout
  },
  TOGGLE_FIXED_HEADER: (state, fixed) => {
    Storage.set(DEFAULT_FIXED_HEADER, fixed)
    state.fixedHeader = fixed
  },
  TOGGLE_FIXED_SIDEBAR: (state, fixed) => {
    Storage.set(DEFAULT_FIXED_SIDEMENU, fixed)
    state.fixSidebar = fixed
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
    console.log(`'%c ${color}`, `color:${color};`)
    Storage.set(DEFAULT_COLOR, color)
    state.color = color
  },
  TOGGLE_WEAK: (state, flag) => {
    Storage.set(DEFAULT_COLOR_WEAK, flag)
    state.weak = flag
  },
  SET_SCREEN: (state, screen) => {
    state.screen = screen
  }
}

export const actions = {
  SetScreen ({ commit, dispatch, state }, screen) {
    let device
    let sidebar = true
    switch (screen) {
      case SCREEN_TYPE.SCREEN_XS:
        device = 'mobile'
        sidebar = false
        break
      case SCREEN_TYPE.SCREEN_SM:
      case SCREEN_TYPE.SCREEN_MD:
      case SCREEN_TYPE.SCREEN_LG:
        device = 'tablet'
        sidebar = true
        break
      case SCREEN_TYPE.SCREEN_XL:
      case SCREEN_TYPE.SCREEN_XXL:
      default:
        device = 'desktop'
        sidebar = true
        break
    }

    commit('TOGGLE_DEVICE', device)
    dispatch('SetSidebar', sidebar)
    commit('SET_SCREEN', screen)
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
    if (mode === 'sidemenu') {
      commit('TOGGLE_CONTENT_WIDTH', CONTENT_WIDTH_TYPE.Fluid)
    } else {
      commit('TOGGLE_CONTENT_WIDTH', CONTENT_WIDTH_TYPE.Fixed)
    }
    commit('TOGGLE_LAYOUT_MODE', mode)
  },
  ToggleFixedHeader ({ commit }, fixedHeader) {
    if (!fixedHeader) {
      commit('TOGGLE_FIXED_HEADER_HIDDEN', false)
    }
    commit('TOGGLE_FIXED_HEADER', fixedHeader)
  },
  ToggleFixSidebar ({ commit }, fixSidebar) {
    commit('TOGGLE_FIXED_SIDEBAR', fixSidebar)
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
    commit('TOGGLE_WEAK', weakFlag)
  }
}

export const getters = {
  sidebar: state => state.sidebar,
  device: state => state.device,
  theme: state => state.theme,
  layout: state => state.layout,
  contentWidth: state => state.contentWidth,
  fixedHeader: state => state.fixedHeader,
  fixSidebar: state => state.fixSidebar,
  autoHideHeader: state => state.autoHideHeader,
  color: state => state.color,
  weak: state => state.weak,
  screen: state => state.screen
}
