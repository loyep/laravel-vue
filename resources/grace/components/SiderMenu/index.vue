<template>
  <a-drawer v-if="isMobile"
            :visible="!collapsed"
            :style="{
              padding: 0,
              height: '100vh',
            }"
            placement="left"
            @close="() => onCollapse(true)"
  >
    <sider-menu
      :menus="menus"
      :theme="theme"
      :mode="mode"
      :collapsed="isMobile ? false : collapsed"
      @select="onSelect"
    />
  </a-drawer>
  <sider-menu v-else
              :menus="menus"
              :theme="theme"
              :mode="mode"
              :collapsed="collapsed"
              @select="onSelect"
  />
</template>

<script>
import { Drawer } from 'ant-design-vue'
import SiderMenu from './SiderMenu'
import { deviceMixin, themeMixin } from '@/mixins'

export default {
  name: 'SiderMenuWrapper',
  components: {
    SiderMenu,
    'ADrawer': Drawer
  },
  mixins: [themeMixin, deviceMixin],
  props: {
    mode: {
      type: String,
      required: false,
      default: 'inline'
    },
    theme: {
      type: String,
      required: false,
      default: 'dark'
    },
    collapsible: {
      type: Boolean,
      required: false,
      default: false
    },
    collapsed: {
      type: Boolean,
      required: false,
      default: false
    },
    onCollapse: {
      type: Function,
      required: true
    },
    menus: {
      type: Array,
      required: true
    }
  },
  methods: {
    onSelect (obj) {
      this.$emit('menuSelect', obj)
    }
  }
}
</script>

<style lang="less">

@import '~@/styles/variables.less';

@nav-header-height: @layout-header-height;

.top-nav-menu li.ant-menu-item {
  height: @nav-header-height;
  line-height: @nav-header-height;
}
.drawer .drawer-content {
  background: #001529;
}
.ant-menu-inline-collapsed {
  & > .ant-menu-item .sider-menu-item-img + span,
  &
    > .ant-menu-item-group
    > .ant-menu-item-group-list
    > .ant-menu-item
    .sider-menu-item-img
    + span,
  & > .ant-menu-submenu > .ant-menu-submenu-title .sider-menu-item-img + span {
    display: inline-block;
    max-width: 0;
    opacity: 0;
  }
}
.ant-menu-item .sider-menu-item-img + span,
.ant-menu-submenu-title .sider-menu-item-img + span {
  opacity: 1;
  transition: opacity 0.3s @ease-in-out, width 0.3s @ease-in-out;
}
.ant-drawer-left {
  .ant-drawer-body {
    padding: 0;
  }
}
</style>
