<template>
  <a-drawer
    v-if="isMobile"
    :visible="!collapsed"
    :wrapStyle="{
      padding: 0,
      height: '100vh',
    }"
    zIndex="10"
    placement="left"
    @close="() => collapse(true)"
  >
    <sider-menu
      :menus="menus"
      :mode="mode"
      :collapsed="(isMobile ? false : isMobile)"
      @select="onSelect"
    />
  </a-drawer>
  <sider-menu v-else
              :menus="menus"
              :mode="mode"
              :collapsed="collapsed"
              @select="onSelect"
  />
</template>

<script lang="ts">
import { Component, Vue, Prop, Provide } from 'vue-property-decorator';
import { State, Mutation, namespace } from 'vuex-class';
import { Drawer } from 'ant-design-vue'
import SiderMenu from './SiderMenu.vue'

const themeModule = namespace('theme');

@Component({
  components: {
    SiderMenu,
    'ADrawer': Drawer
  }
})
export default class SiderMenuWrapper extends Vue {

  @Prop({ default: 'inline' })
  mode: string

  @Prop({ default: false })
  collapsible: boolean

  @Prop({ default: false })
  collapsed: boolean

  @Prop()
  menus: Array<any>

  @themeModule.Getter('isMobile')
  isMobile: boolean

  onSelect (obj) {
    this.$emit('menuSelect', obj)
  }

  collapse (collapsed) {
    this.$emit('collapse', collapsed)
  }
}
</script>

<style lang="less">

.drawer .drawer-content {
  background: #001529;
}
.ant-drawer-left {
  .ant-drawer-body {
    padding: 0;
  }
}

</style>
