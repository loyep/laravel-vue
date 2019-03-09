import { mapState } from 'vuex'

const themeMixin = {
  computed: {
    ...mapState({
      layoutMode: state => state.app.layout,
      navTheme: state => state.app.theme,
      primaryColor: state => state.app.color,
      colorWeak: state => state.app.weak,
      fixedHeader: state => state.app.fixedHeader,
      fixSidebar: state => state.app.fixSidebar,
      contentWidth: state => state.app.contentWidth,
      autoHideHeader: state => state.app.autoHideHeader,
      sidebarOpened: state => state.app.sidebar
    }),
    isTopMenu () {
      return this.layoutMode === 'topmenu'
    },
    isSideMenu () {
      return this.layoutMode === 'sidemenu'
    }
  },
  getters: {
    getTheme () {
      return this.navTheme
    }
  }
}

export default themeMixin
