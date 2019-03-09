<template>
  <div :class="screen">
    <a-layout>
      <sider-menu
        v-if="!(isTopMenu && !isMobile)"
        :menus="menus"
        :collapsed="collapsed"
        :onCollapse="handleMenuCollapse"
        mode="inline"
        :collapsible="true"
      />
      <a-layout :style="[{ minHeight: '100vh' }, layoutStyle]">
        <basic-header
          :menus="menus"
          :collapsed="collapsed"
          :onCollapse="handleMenuCollapse"
        />
        <a-layout-content class="basic-content" :style="contentStyle">
          <router-view />
        </a-layout-content>
        <basic-footer />
        <setting-drawer />
      </a-layout>
    </a-layout>
  </div>
</template>

<script>
import SiderMenu from '@/components/SiderMenu'
import SettingDrawer from '@/components/SettingDrawer'
import Footer from './components/Footer'
import Header from './components/Header'
import { mapState, mapActions } from 'vuex'
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
      collapsed: false
    }
  },
  computed: {
    ...mapState({
      sidebar: state => state.app.sidebar,
      mainMenu: state => state.permission.addRouters,
      screen: state => state.app.screen
    }),
    contentStyle () {
      if (this.fixSidebar) {
        return {}
      }
      return { paddingTop: 0 }
    },
    layoutStyle () {
      if (this.fixSidebar && this.layoutMode !== 'topmenu' && !this.isMobile) {
        return {
          paddingLeft: this.collapsed ? '80px' : '256px'
        }
      }
      return {}
    }
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

.basic-content {
  margin: 24px;
  padding-top: @layout-header-height;
}

</style>
