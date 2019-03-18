import config from '@/config/index'
import Storage from '@/utils/storage'
import { SCREEN_TYPE, DEVICE_TYPE } from '@/utils/device'
import { Module, MutationTree, ActionTree, GetterTree, ActionContext } from 'vuex';
import { RootState } from '@/store/index';

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


export interface IThemeState {
  sidebar: boolean,
  device: string,
  theme: string,
  layout: string,
  contentWidth: string,
  fixedHeader: boolean,
  fixSidebar: boolean,
  autoHideHeader: boolean,
  color: string,
  weak: boolean,
  screen: string
}

export const state: IThemeState = {
  sidebar: Storage.get(SIDEBAR_TYPE, true),
  device: 'desktop',
  theme: Storage.get(DEFAULT_THEME, config.theme),
  layout: Storage.get(DEFAULT_LAYOUT_MODE, config.layout),
  contentWidth: Storage.get(DEFAULT_CONTENT_WIDTH_TYPE, config.contentWidth),
  fixedHeader: Storage.get(DEFAULT_FIXED_HEADER, config.fixedHeader),
  fixSidebar: Storage.get(DEFAULT_FIXED_SIDEMENU, config.fixSidebar),
  autoHideHeader: Storage.get(DEFAULT_FIXED_HEADER_HIDDEN, config.autoHideHeader),
  color: Storage.get(DEFAULT_COLOR, config.primaryColor),
  weak: Storage.get(DEFAULT_COLOR_WEAK, config.colorWeak),
  screen: 'screen-lg'
}

export const mutations: MutationTree<IThemeState> = {
  SET_SIDEBAR_TYPE: (state: IThemeState, type: boolean) => {
    Storage.set(SIDEBAR_TYPE, type)
    state.sidebar = type
  },
  CLOSE_SIDEBAR: (state: IThemeState) => {
    Storage.set(SIDEBAR_TYPE, true)
    state.sidebar = false
  },
  TOGGLE_DEVICE: (state: IThemeState, device: string) => {
    state.device = device
  },
  TOGGLE_THEME: (state: IThemeState, theme: string) => {
    Storage.set(DEFAULT_THEME, theme)
    state.theme = theme
  },
  TOGGLE_LAYOUT_MODE: (state: IThemeState, layout: string) => {
    Storage.set(DEFAULT_LAYOUT_MODE, layout)
    state.layout = layout
  },
  TOGGLE_FIXED_HEADER: (state: IThemeState, fixed: boolean) => {
    Storage.set(DEFAULT_FIXED_HEADER, fixed)
    state.fixedHeader = fixed
  },
  TOGGLE_FIXED_SIDEBAR: (state: IThemeState, fixed: boolean) => {
    Storage.set(DEFAULT_FIXED_SIDEMENU, fixed)
    state.fixSidebar = fixed
  },
  TOGGLE_FIXED_HEADER_HIDDEN: (state: IThemeState, show: boolean) => {
    Storage.set(DEFAULT_FIXED_HEADER_HIDDEN, show)
    state.autoHideHeader = show
  },
  TOGGLE_CONTENT_WIDTH: (state: IThemeState, type: string) => {
    Storage.set(DEFAULT_CONTENT_WIDTH_TYPE, type)
    state.contentWidth = type
  },
  TOGGLE_COLOR: (state: IThemeState, color: string) => {
    console.log(`'%c ${color}`, `color:${color};`)
    Storage.set(DEFAULT_COLOR, color)
    state.color = color
  },
  TOGGLE_WEAK: (state: IThemeState, flag: boolean) => {
    Storage.set(DEFAULT_COLOR_WEAK, flag)
    state.weak = flag
  },
  SET_SCREEN: (state: IThemeState, screen: string) => {
    state.screen = screen
  }
}

export const actions: ActionTree<IThemeState, RootState> = {
  SetScreen (context: ActionContext<IThemeState, RootState>, screen: string) {
    let device: string
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

    context.commit('TOGGLE_DEVICE', device)
    context.commit('SET_SIDEBAR_TYPE', sidebar)
    context.commit('SET_SCREEN', screen)
  },
  SetSidebar (context: ActionContext<IThemeState, RootState>, type: boolean) {
    context.commit('SET_SIDEBAR_TYPE', type)
  },
  CloseSidebar (context: ActionContext<IThemeState, RootState>) {
    context.commit('CLOSE_SIDEBAR')
  },
  ToggleDevice (context: ActionContext<IThemeState, RootState>, device: string) {
    context.commit('TOGGLE_DEVICE', device)
  },
  ToggleTheme (context: ActionContext<IThemeState, RootState>, theme: string) {
    context.commit('TOGGLE_THEME', theme)
  },
  ToggleLayoutMode (context: ActionContext<IThemeState, RootState>, mode: string) {
    if (mode === 'sidemenu') {
      context.commit('TOGGLE_CONTENT_WIDTH', CONTENT_WIDTH_TYPE.Fluid)
    } else {
      context.commit('TOGGLE_CONTENT_WIDTH', CONTENT_WIDTH_TYPE.Fixed)
    }
    context.commit('TOGGLE_LAYOUT_MODE', mode)
  },
  ToggleFixedHeader (context: ActionContext<IThemeState, RootState>, fixedHeader: boolean) {
    if (!fixedHeader) {
      context.commit('TOGGLE_FIXED_HEADER_HIDDEN', false)
    }
    context.commit('TOGGLE_FIXED_HEADER', fixedHeader)
  },
  ToggleFixSidebar (context: ActionContext<IThemeState, RootState>, fixSidebar: boolean) {
    context.commit('TOGGLE_FIXED_SIDEBAR', fixSidebar)
  },
  ToggleFixedHeaderHidden (context: ActionContext<IThemeState, RootState>, show: boolean) {
    context.commit('TOGGLE_FIXED_HEADER_HIDDEN', show)
  },
  ToggleContentWidth (context: ActionContext<IThemeState, RootState>, type: string) {
    context.commit('TOGGLE_CONTENT_WIDTH', type)
  },
  ToggleColor (context: ActionContext<IThemeState, RootState>, color: string) {
    context.commit('TOGGLE_COLOR', color)
  },
  ToggleWeak (context: ActionContext<IThemeState, RootState>, weakFlag: boolean) {
    context.commit('TOGGLE_WEAK', weakFlag)
  }
}

export const getters: GetterTree<IThemeState, RootState> = {
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
  screen: state => state.screen,
  isTopMenu: state => state.layout === 'topmenu',
  isSideMenu: state => state.layout === 'sidemenu',
  isMobile: state => state.device === DEVICE_TYPE.MOBILE,
  isDesktop: state => state.device === DEVICE_TYPE.DESKTOP,
  isTablet: state => state.device === DEVICE_TYPE.TABLET
}

const theme: Module<IThemeState, RootState> = {
  namespaced: true,
  state: state,
  actions: actions,
  mutations: mutations,
  getters: getters
}

export default theme;