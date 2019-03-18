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
import SiderMenu from '@/components/SiderMenu'
import SettingDrawer from '@/components/SettingDrawer'
import Footer from './components/Footer'
import Header from './components/Header'
import { mapGetters } from 'vuex'
import { themeMixin } from '@/mixins'
import { Component, Vue } from 'vue-property-decorator';

import { State, Mutation, namespace } from 'vuex-class';

const themeModule = namespace('app');
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
  mixins: [ themeMixin ]
})
export default class BasicLayout extends Vue {
  
  private menus: Array<any> = []

  private collapsed: boolean = false

  private showSettingDrawer: boolean = false

  @themeModule.State('sidebar')
  private sidebar: boolean;

  @themeModule.State('screen')
  private screen: string;

  @themeModule.State('fixedHeader')
  private fixedHeader: boolean;

  @themeModule.State('fixSidebar')
  private fixSidebar: boolean;

  @themeModule.State('layoutMode')
  private layoutMode: string;

  @themeModule.State('device')
  private device: string;

  @permissionModule.State('addRouters')
  private mainMenu: Array<any>;

  get contentStyle() {
    if (this.fixedHeader) {
        return {}
      }
      return { paddingTop: 0 }
  }

  get layoutStyle () {
    if (this.fixSidebar && this.layoutMode !== 'topmenu' && this.device !== 'mobile' ) {
      return {
        paddingLeft: this.collapsed ? '80px' : '256px'
      }
    }
    return {}
  }

  created() {
    this.menus = this.mainMenu.find((item) => item.path === '/').children
    this.showSettingDrawer = (<any>window).config.setting_drawer ? (<any>window).config.setting_drawer : false
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
