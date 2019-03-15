<template>
  <div class="header">
    <router-link v-if="isMobile" class="logo" :to="{path:'/'}">
      <img src="~@/assets/images/logo.svg" alt="logo" width="32">
    </router-link>
    <span class="trigger" @click="toggle">
      <a-icon :type="collapsed ? 'menu-unfold' : 'menu-fold'" />
    </span>
    <right-content />
  </div>
</template>

<script>
import RightContent from './RightContent'
import { themeMixin } from '@/mixins'

export default {
  name: 'GlobalHeader',
  components: {
    RightContent
  },
  mixins: [
    themeMixin
  ],
  props: {
    collapsed: {
      type: Boolean,
      required: false,
      default: false
    }
    // collapse: {
    //   type: Function,
    //   required: true
    // }
  },
  methods: {
    toggle () {
      this.$emit('collapse', !this.collapsed)
      // this.collapse(!this.collapsed)
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.header {
  position: relative;
  height: @layout-header-height;
  padding: 0;
  font-size: 0;
  background: #fff;
  box-shadow: 0 1px 4px rgba(0, 21, 41, 0.08);
}

.logo {
  display: inline-block;
  height: @layout-header-height;
  padding: 0 0 0 24px;
  font-size: 20px;
  line-height: @layout-header-height;
  vertical-align: top;
  cursor: pointer;
  img {
    display: inline-block;
    vertical-align: middle;
  }
}

.trigger {
  height: @layout-header-height;
  padding: ~'calc((@{layout-header-height} - 20px) / 2)' 24px;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s, padding 0s;
  &:hover {
    background: @pro-header-hover-bg;
  }

  @media only screen and (max-width: @screen-md) {
    padding: 22px 24px;
  }
}

.dark {
  height: @layout-header-height;
  .action {
    color: rgba(255, 255, 255, 0.85);
    > i {
      color: rgba(255, 255, 255, 0.85);
    }
    &:hover {
      background: @primary-color;
    }
  }
}

@media only screen and (max-width: @screen-md) {
  .header {
    :global(.ant-divider-vertical) {
      vertical-align: unset;
    }
    .name {
      display: none;
    }
    i.trigger {
      padding: 22px 12px;
    }
    .logo {
      padding-left: 12px;
      padding-right: 12px;
      position: relative;
    }
    .right {
      position: absolute;
      right: 12px;
      top: 0;
      background: #fff;
      .account {
        .avatar {
          margin-right: 0;
        }
      }
    }
  }
}

</style>
