<template>
  <a-layout-sider
    v-model="collapsed"
    :class="['sider', {'fixSiderbar': fixSiderbar, 'light': theme === 'light'} ]"
    :width="256"
    breakpoint="lg"
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
      required: true
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
  mounted () {
    console.log(this.theme)
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
