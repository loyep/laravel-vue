import { DEVICE_TYPE } from '@/utils/device'
import { mapState } from 'vuex'

const themeMixin = {
  computed: {
    ...mapState('theme', {
      layoutMode: state => state.layout,
      navTheme: state => state.theme,
      primaryColor: state => state.color,
      colorWeak: state => state.weak,
      fixedHeader: state => state.fixedHeader,
      fixSidebar: state => state.fixSidebar,
      contentWidth: state => state.contentWidth,
      autoHideHeader: state => state.autoHideHeader,
      sidebarOpened: state => state.sidebar,
      device: state => state.device
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
