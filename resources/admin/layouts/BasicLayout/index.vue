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
        <basic-header
          :menus="menus"
          :collapsed="collapsed"
          @collapse="handleMenuCollapse"
        />
        <a-layout-content class="basic-content" :style="contentStyle">
          <router-view />
        </a-layout-content>
        <basic-footer />
      </a-layout>
    </a-layout>
    <setting-drawer v-if="showSettingDrawer" />
  </div>
</template>

<script lang="ts">
import { Layout } from 'ant-design-vue'
import SiderMenu from '@/components/SiderMenu/index.vue'
const SettingDrawer = () => import('@/components/SettingDrawer/index.vue')
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import { Component, Vue } from 'vue-property-decorator';

import { namespace } from 'vuex-class';

const themeModule = namespace('theme');
const permissionModule = namespace('permission');

@Component({
  components: {
    BasicFooter: Footer,
    BasicHeader: Header,
    SiderMenu,
    SettingDrawer,
    'ALayout': Layout,
    'ALayoutContent': Layout.Content
  },
})
export default class BasicLayout extends Vue {
  
  private menus: Array<any> = []

  private collapsed: boolean = false

  private showSettingDrawer: boolean = false

  @themeModule.Getter('screen')
  private screen: string;

  @themeModule.Getter('fixedHeader')
  private fixedHeader: boolean;

  @themeModule.Getter('fixSidebar')
  private fixSidebar: boolean;

  @themeModule.Getter('isTopMenu')
  private isTopMenu: boolean;

  @themeModule.Getter('isMobile')
  private isMobile: boolean;

  @permissionModule.Getter('addRouters')
  private mainMenu: Array<any>;

  get contentStyle() {
    if (this.fixedHeader) {
        return {}
      }
      return { paddingTop: 0 }
  }

  get layoutStyle () {
    if (this.fixSidebar && !this.isTopMenu && !this.isMobile ) {
      return {
        paddingLeft: this.collapsed ? '80px' : '256px'
      }
    }
    return {}
  }

  created() {
    this.menus = this.mainMenu.find((item) => item.path === '/').children
    this.showSettingDrawer = process.env.NODE_ENV === 'development'
  }

  setSidebar (value) {
    this.$store.dispatch('theme/SetSidebar', value)
  }
  
  handleMenuCollapse (collapsed) {
    this.collapsed = !this.collapsed
    this.setSidebar(this.collapsed)
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
