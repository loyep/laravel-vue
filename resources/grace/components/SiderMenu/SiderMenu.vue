<template>
  <a-layout-sider
    :class="['sider', {'fixSiderbar': fixSiderbar, 'light': navTheme === 'light'} ]"
    :width="256"
    breakpoint="lg"
    :collapsed="collapsed"
    collapsible
    :trigger="null"
  >
    <logo />
    <base-menu
      :collapsed="collapsed"
      :menu="menus"
      mode="inline"
      :theme="navTheme"
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
@import './style.less';
</style>
