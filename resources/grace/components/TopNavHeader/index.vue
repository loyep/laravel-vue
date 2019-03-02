<template>
  <div class="head">
    <div class="main">
      <div class="left">
        <div id="logo" class="logo">
          <router-link :to="{ path: '/' }">
            <img :src="logo" alt="logo">
            <h1>{{ title }}</h1>
          </router-link>
        </div>
        <div :style="{ maxWidth }">
          BaseMenu
        </div>
      </div>
      RightContent
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
import logo from '@/assets/images/logo.png'
export default {
  name: 'TopNavHeader',
  props: {
    title: {
      type: String,
      default: function () {
        return window.config.name
      },
      required: false
    }
  },
  data () {
    return {
      logo
    }
  },
  computed: {
    maxWidth () {
    //   return maxWidth: (props.contentWidth === 'Fixed' ? 1200 : window.innerWidth) - 280 - 165 - 40,
      return 1200
    }
  }
}
</script>

<style lang="less" scoped>
@import '~ant-design-vue/es/style/themes/default.less';

.head {
  width: 100%;
  transition: background 0.3s, width 0.2s;
  height: @layout-header-height;
  box-shadow: 0 1px 4px rgba(0, 21, 41, 0.08);
  position: relative;

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
      flex: 1;
      display: flex;
    }
    .right {
      width: 324px;
    }
  }
}

.logo {
  width: 165px;
  height: @layout-header-height;
  position: relative;
  line-height: @layout-header-height;
  transition: all 0.3s;
  overflow: hidden;
  img {
    display: inline-block;
    vertical-align: middle;
    height: 32px;
  }
  h1 {
    color: #fff;
    display: inline-block;
    vertical-align: top;
    font-size: 16px;
    margin: 0 0 0 12px;
    font-weight: 400;
  }
}

.light {
  h1 {
    color: #002140;
  }
}

.menu {
  border: none;
  height: @layout-header-height;
  line-height: @layout-header-height;
}

</style>

<style lang="less">

@import '~ant-design-vue/es/style/themes/default.less';

.head {
    .ant-menu-submenu.ant-menu-submenu-horizontal {
        line-height: @layout-header-height;
        height: 100%;
        .ant-menu-submenu-title {
        height: 100%;
        }
    }
}

</style>
