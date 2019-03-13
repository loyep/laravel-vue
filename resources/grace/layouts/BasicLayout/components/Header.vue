<template>
  <a-layout-header :style="{ padding: 0, width: getHeadWidth }" :class="{ 'fixedHeader': fixedHeader }">
    <top-nav-header v-if="isTopMenu && !isMobile" :menus="menus" :collapsed="collapsed" />
    <global-header v-else :collapsed="collapsed" @collapse="collapse" />
  </a-layout-header>
</template>

<script>

import { Layout } from 'ant-design-vue'
import TopNavHeader from '@/components/TopNavHeader'
import GlobalHeader from '@/components/GlobalHeader'
import { themeMixin } from '@/mixins'

export default {
  name: 'Header',
  components: {
    TopNavHeader,
    GlobalHeader,
    'ALayoutHeader': Layout.Header
  },
  mixins: [ themeMixin ],
  props: {
    collapsed: {
      type: Boolean,
      required: true
    },
    menus: {
      type: Array,
      required: true
    }
  },
  computed: {
    getHeadWidth () {
      // const { isMobile, collapsed, setting } = this.props;
    // const { fixedHeader, layout } = setting;
    // if (isMobile || !fixedHeader || layout === 'topmenu') {
      // return '100%';
    // }
    // return collapsed ? 'calc(100% - 80px)' : 'calc(100% - 256px)';
      if (this.isMobile || !this.fixedHeader || this.isTopMenu) {
        return '100%'
      }
      return this.collapsed ? 'calc(100% - 80px)' : 'calc(100% - 256px)'
    }
  },
  methods: {
    toggle () {
      console.log('sss' + this.collapsed)
      this.collapse(!this.collapsed)
    },
    collapse (collapsed) {
      this.$emit('collapse', collapsed)
    }
  }
}
</script>

<style lang="less" scoped>
.fixedHeader {
  position: fixed;
  top: 0;
  right: 0;
  z-index: 9;
  width: 100%;
  transition: width 0.2s;
}
</style>
