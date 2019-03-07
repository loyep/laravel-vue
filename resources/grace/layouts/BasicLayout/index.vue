<template>
  <a-layout>
    <sider-menu
      :menus="menus"
      :collapsed="collapsed"
      :onCollapse="handleMenuCollapse"
      mode="inline"
      :collapsible="true"
    />
    <a-layout :style="{ minHeight: '100vh' }">
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
import { deviceMixin } from '@/mixins'

export default {
  name: 'BasicLayout',
  components: {
    BasicFooter: Footer,
    BasicHeader: Header,
    SiderMenu,
    SettingDrawer
  },
  mixins: [
    deviceMixin
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
