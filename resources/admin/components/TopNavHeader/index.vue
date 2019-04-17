<template>
  <div :class="{ head: true, light: theme === 'light' }">
    <div :class="[ 'main', { wide: wide }]">
      <div class="left">
        <div id="logo" class="logo">
          <router-link :to="{ path: '/' }">
            <img src="~@/assets/images/logo.svg" alt="logo">
            <h1>{{ title }}</h1>
          </router-link>
        </div>
        <div :style="{ maxWidth }">
          <base-menu
            :collapsed="collapsed"
            :menus="menus"
            mode="horizontal"
            :theme="theme"
            class="menu"
            @select="onSelect"
          />
        </div>
      </div>
      <right-content />
    </div>
  </div>
</template>

<script>
import BaseMenu from '@/components/SiderMenu/BaseMenu'
import RightContent from '@/components/GlobalHeader/RightContent'
import { mapGetters } from 'vuex'

const themeModule = namespace('theme')

export default {
  name: 'TopNavHeader',
  components: {
    BaseMenu,
    RightContent
  },
  props: {
    collapsed: {
      type: Boolean,
      default: true
    },
    menus: {
      type: Array,
      default: function () {
        return []
      }
    }
  },
  computed: {
    ...mapGetters('theme', {
      theme: 'theme'
    }),
    title () {
      return window.config.name
    },
    wide () {
      return this.contentWidth === 'Fixed'
    },
    maxWidth () {
      const width = (this.contentWidth === 'Fixed' ? 1200 : window.innerWidth) - 280 - 120 - 40
      return width + 'px'
    }
  },
  methods: {

    onSelect () {
      console.log(222)
    }
  }

}

</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.head {
  position: relative;
  width: 100%;
  height: @layout-header-height;
  box-shadow: 0 1px 4px rgba(0, 21, 41, 0.08);
  transition: background 0.3s, width 0.2s;
  :global {
    .ant-menu-submenu.ant-menu-submenu-horizontal {
      height: 100%;
      line-height: @layout-header-height;
      .ant-menu-submenu-title {
        height: 100%;
      }
    }
  }
  &.light {
    background-color: #fff;
  }
  .main {
    display: flex;
    height: @layout-header-height;
    padding-left: 24px;
    &.wide {
      max-width: 1200px;
      margin: auto;
      padding-left: 0;
    }
    .left {
      display: flex;
      flex: 1;
    }
    // .right {
      // width: 324px;
    // }
  }
}

.logo {
  position: relative;
  width: 165px;
  height: @layout-header-height;
  overflow: hidden;
  line-height: @layout-header-height;
  transition: all 0.3s;
  img {
    display: inline-block;
    height: 32px;
    vertical-align: middle;
  }
  h1 {
    display: inline-block;
    margin: 0 0 0 12px;
    color: #fff;
    font-weight: 400;
    font-size: 16px;
    vertical-align: top;
  }
}

.light {
  h1 {
    color: #002140;
  }
}

.menu {
  height: @layout-header-height;
  line-height: @layout-header-height;
  border: none;
}
</style>
