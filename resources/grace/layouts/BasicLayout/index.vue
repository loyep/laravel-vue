<template>
  <a-layout>
    <sider-menu
      :menus="menus"
      :collapsed="collapsed"
      :onCollapse="handleMenuCollapse"
      mode="inline"
      :collapsible="true"
    />
    <a-layout :style="[{ minHeight: '100vh' }, getLayoutStyle()]">
      <basic-header
        :collapsed="collapsed"
        :onCollapse="handleMenuCollapse"
      />
      <a-layout-content>
        <router-view />
      </a-layout-content>
      <basic-footer />
      <setting-drawer />
    </a-layout>
  </a-layout>
</template>

<script>
import SiderMenu from '@/components/SiderMenu'
import SettingDrawer from '@/components/SettingDrawer'
import Footer from './components/Footer'
import Header from './components/Header'
import { mapState, mapActions } from 'vuex'
import logo from '@/assets/images/logo.png'
import { themeMixin, deviceMixin } from '@/mixins'

export default {
  name: 'BasicLayout',
  components: {
    BasicFooter: Footer,
    BasicHeader: Header,
    SiderMenu,
    SettingDrawer
  },
  mixins: [
    deviceMixin,
    themeMixin
  ],
  data () {
    return {
      menus: [],
      collapsed: false,
      logo
    }
  },
  computed: {
    ...mapState({
      sidebar: state => state.app.sidebar,
      mainMenu: state => state.permission.addRouters
    })
  },
  created () {
    this.menus = this.mainMenu.find((item) => item.path === '/').children
  },
  methods: {
    ...mapActions({
      setSidebar: 'app/SetSidebar'
    }),
    handleMenuCollapse (collapsed) {
      this.collapsed = !this.collapsed
      this.setSidebar(this.collapsed)
    },
    getLayoutStyle () {
      if (this.fixSiderbar && this.layoutMode !== 'topmenu' && !this.isMobile) {
        return {
          paddingLeft: this.collapsed ? '80px' : '256px'
        }
      }
      return {}
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.content {
  margin: 24px;
  padding-top: @layout-header-height;
}

</style>
