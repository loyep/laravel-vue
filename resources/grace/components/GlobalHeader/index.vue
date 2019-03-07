<template>
  <div class="header">
    <logo v-if="isMobile" :showTitle="false" />
    <span class="trigger" @click="toggle">
      <a-icon :type="collapsed ? 'menu-unfold' : 'menu-fold'" />
    </span>
    <right-content />
  </div>
</template>

<script>
import RightContent from './RightContent'
import { deviceMixin } from '@/mixins'
import Logo from '@/components/Logo'
export default {
  name: 'GlobalHeader',
  components: {
    RightContent, Logo
  },
  mixins: [
    deviceMixin
  ],
  props: {
    collapsed: {
      type: Boolean,
      required: false,
      default: false
    },
    onCollapse: {
      type: Function,
      required: true
    }
  },
  methods: {
    toggle () {
      this.onCollapse(!this.collapsed)
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
  background: #fff;
  box-shadow: 0 1px 4px rgba(0, 21, 41, 0.08);
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
