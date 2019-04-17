<template>
  <div :class="screen">
    <a-layout>
      <sider-menu
        v-if="!(isTopMenu && !isMobile)"
        :menus="menus"
        :collapsed="collapsed"
        mode="inline"
        :collapsible="true"
        @collapse="handleMenuCollapse"
      />
      <a-layout :style="[{ minHeight: '100vh' }, layoutStyle]">
        <basic-header :menus="menus" :collapsed="collapsed" @collapse="handleMenuCollapse" />
        <a-layout-content class="basic-content" :style="contentStyle">
          <router-view />
        </a-layout-content>
        <basic-footer />
      </a-layout>
    </a-layout>
    <setting-drawer v-if="showSettingDrawer" />
  </div>
</template>

<script>
import { Layout } from 'ant-design-vue'
import SiderMenu from '@/components/SiderMenu'
import Footer from './components/Footer'
import Header from './components/Header'
import { mapGetters } from 'vuex'

const SettingDrawer = () => import('@/components/SettingDrawer')

export default {
  name: 'BasicLayout',
  components: {
    BasicFooter: Footer,
    BasicHeader: Header,
    SiderMenu,
    SettingDrawer,
    ALayout: Layout,
    ALayoutContent: Layout.Content
  },
  data () {
    return {
      collapsed: false,
      showSettingDrawer: false,
      menus: []
    }
  },
  computed: {
    ...mapGetters('theme', {
      screen: 'screen',
      fixedHeader: 'fixedHeader',
      fixSidebar: 'fixSidebar',
      isTopMenu: 'isTopMenu',
      isMobile: 'isMobile'
    }),
    ...mapGetters('permission', {
      mainMenu: 'addRouters'
    }),
    contentStyle () {
      if (this.fixedHeader) {
        return {}
      }
      return { paddingTop: 0 }
    },
    layoutStyle () {
      if (this.fixSidebar && !this.isTopMenu && !this.isMobile) {
        return {
          paddingLeft: this.collapsed ? '80px' : '256px'
        }
      }
      return {}
    }
  },
  created () {
    this.menus = this.mainMenu.find(item => item.path === '/').children
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
