<template>
  <a-layout-sider
    v-model="collapsed"
    :class="['sider', isDesktop ? null : 'shadow', theme, fixSiderbar ? 'ant-fixed-sidemenu' : null ]"
    width="256px"
    :collapsed="collapsed"
    :collapsible="collapsible"
    :trigger="null"
  >
    <logo />
    <base-menu
      v-bind="$props"
      :collapsed="collapsed"
      :menu="menus"
      :theme="theme"
      :mode="mode"
      :style="{ padding: '16px 0', width: '100%' }"
      @select="onSelect"
    />
  </a-layout-sider>
</template>

<script>
import Logo from '@/components/Logo'
import BaseMenu from './BaseMenu'

import { deviceMixin, themeMixin } from '@/mixins'
export default {
  name: 'SiderMenu',
  components: {
    Logo,
    BaseMenu

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
    menus: {
      type: Array,
      required: true
    }
  },
  methods: {
    onSelect (obj) {
      this.$emit('onSelect', obj)
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

@nav-header-height: @layout-header-height;

.sider {
  position: relative;
  z-index: 10;
  min-height: 100vh;
  box-shadow: 2px 0 6px rgba(0, 21, 41, 0.35);
  &.fixSiderBar {
    position: fixed;
    top: 0;
    left: 0;
    box-shadow: 2px 0 8px 0 rgba(29, 35, 41, 0.05);
    :global {
      .ant-menu-root {
        height: ~'calc(100vh - @{nav-header-height})';
        overflow-y: auto;
      }
      .ant-menu-inline {
        border-right: 0;
        .ant-menu-item,
        .ant-menu-submenu-title {
          width: 100%;
        }
      }
    }
  }
  &.light {
    background-color: white;
    box-shadow: 2px 0 8px 0 rgba(29, 35, 41, 0.05);
    .logo {
      background: white;
      box-shadow: 1px 1px 0 0 @border-color-split;
      h1 {
        color: @primary-color;
      }
    }
    :global(.ant-menu-light) {
      border-right-color: transparent;
    }
  }
}
</style>
