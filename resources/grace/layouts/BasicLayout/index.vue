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
          <grid-content>
            <router-view />
          </grid-content>
        </a-layout-content>
        <basic-footer />
        <setting-drawer v-if="showSettingDrawer" />
      </a-layout>
    </a-layout>
  </div>
</template>

<script>
import SiderMenu from '@/components/SiderMenu'
import SettingDrawer from '@/components/SettingDrawer'
import Footer from './components/Footer'
import Header from './components/Header'
import GridContent from '@/layouts/PageLayout/GridContent'
import { mapState } from 'vuex'
import { themeMixin } from '@/mixins'

export default {
  name: 'BasicLayout',
  components: {
    BasicFooter: Footer,
    BasicHeader: Header,
    SiderMenu,
    SettingDrawer,
    GridContent
  },
  mixins: [ themeMixin ],
  data () {
    return {
      menus: [],
      collapsed: false,
      showSettingDrawer: false
    }
  },
  computed: {
    ...mapState({
      sidebar: state => state.theme.sidebar,
      mainMenu: state => state.permission.addRouters,
      screen: state => state.theme.screen
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
    this.showSettingDrawer = process.env.NODE_ENV === 'development'
  },
  methods: {
    setSidebar (value) {
      this.$store.dispatch('theme/SetSidebar', value)
    },
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
