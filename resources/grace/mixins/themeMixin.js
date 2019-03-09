import { DEVICE_TYPE } from '@/utils/device'
import { mapState } from 'vuex'

const themeMixin = {
  computed: {
    ...mapState({
      layoutMode: state => state.theme.layout,
      navTheme: state => state.theme.theme,
      primaryColor: state => state.theme.color,
      colorWeak: state => state.theme.weak,
      fixedHeader: state => state.theme.fixedHeader,
      fixSidebar: state => state.theme.fixSidebar,
      contentWidth: state => state.theme.contentWidth,
      autoHideHeader: state => state.theme.autoHideHeader,
      sidebarOpened: state => state.theme.sidebar,
      device: state => state.theme.device
    }),
    isTopMenu () {
      return this.layoutMode === 'topmenu'
    },
    isSideMenu () {
      return this.layoutMode === 'sidemenu'
    },
    isMobile () {
      return this.device === DEVICE_TYPE.MOBILE
    },

    isDesktop () {
      return this.device === DEVICE_TYPE.DESKTOP
    },

    isTablet () {
      return this.device === DEVICE_TYPE.TABLET
    }
  }
}

export default themeMixin
