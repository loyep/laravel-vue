<template>
  <a-layout-header :style="{ padding: 0 }">
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
    // collapse: {
    //   type: Function,
    //   required: true
    // },
    menus: {
      type: Array,
      required: true
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

</style>
