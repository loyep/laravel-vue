<template>
  <a-layout-sider
    :class="{'sider': true, 'fixSidebar': fixSidebar, 'light': theme === 'light'}"
    :width="256"
    breakpoint="lg"
    :collapsed="collapsed"
    collapsible
    :trigger="null"
  >
    <div id="logo" class="logo">
      <router-link to="/">
        <img src="~@/assets/images/logo.svg" alt="logo">
        <h1>{{ title }}</h1>
      </router-link>
    </div>
    <base-menu
      :collapsed="collapsed"
      :menus="menus"
      mode="inline"
      :theme="theme"
      :style="{ padding: '16px 0', width: '100%' }"
      @select="onSelect"
    />
  </a-layout-sider>
</template>

<script>
import { Layout } from 'ant-design-vue'
import BaseMenu from './BaseMenu.vue'
import { mapGetters } from 'vuex'

export default {
  name: 'SiderMenu',
  components: {
    BaseMenu,
    ALayoutSider: Layout.Sider
  },
  props: {
    collapsed: {
      type: Boolean,
      default: false
    },
    menus: {
      type: Array,
      required: true
    }
  },
  computed: {
    ...mapGetters('theme', {
      fixSidebar: 'fixSidebar',
      theme: 'theme'
    }),
    title () {
      return window.config.name
    }
  },
  methods: {
    onSelect (obj) {
      this.$emit('onSelect', obj)
    }
  }
}
</script>

<style lang="scss" scoped>
@import "~@/styles/variables";

$nav-header-height: $layout-header-height;

.logo {
  position: relative;
  height: $nav-header-height;
  padding-left: ($menu-collapsed-width - 32px) / 2;
  overflow: hidden;
  line-height: $nav-header-height;
  background: #002140;
  transition: all 0.3s;
  img {
    display: inline-block;
    height: 32px;
    vertical-align: middle;
  }
  h1 {
    display: inline-block;
    margin: 0 0 0 12px;
    color: white;
    font-weight: 600;
    font-size: 20px;
    font-family: Avenir, "Helvetica Neue", Arial, Helvetica, sans-serif;
    vertical-align: middle;
  }
}

.sider {
  position: relative;
  z-index: 10;
  min-height: 100vh;
  box-shadow: 2px 0 6px rgba(0, 21, 41, 0.35);

  &.fixSidebar {
    position: fixed;
    top: 0;
    left: 0;
    box-shadow: 2px 0 8px 0 rgba(29, 35, 41, 0.05);
    :global {
      .ant-menu-root {
        height: calc(100vh - #{$nav-header-height});
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
      box-shadow: 1px 1px 0 0 $border-color-split;
      h1 {
        color: $primary-color;
      }
    }
    :global(.ant-menu-light) {
      border-right-color: transparent;
    }
  }
}

:global {
  .top-nav-menu li.ant-menu-item {
    height: $nav-header-height;
    line-height: $nav-header-height;
  }
  .ant-menu-inline-collapsed {
    & > .ant-menu-item .sider-menu-item-img + span,
    &
      > .ant-menu-item-group
      > .ant-menu-item-group-list
      > .ant-menu-item
      .sider-menu-item-img
      + span,
    &
      > .ant-menu-submenu
      > .ant-menu-submenu-title
      .sider-menu-item-img
      + span {
      display: inline-block;
      max-width: 0;
      opacity: 0;
    }
  }
  .ant-menu-item .sider-menu-item-img + span,
  .ant-menu-submenu-title .sider-menu-item-img + span {
    opacity: 1;
    transition: opacity 0.3s $ease-in-out, width 0.3s $ease-in-out;
  }
}
</style>
