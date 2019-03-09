<template>
  <a-layout-header :style="{ padding: 0 }">
    <top-nav-header v-if="isTopMenu && !isMobile" :menus="menus" :collapsed="collapsed" />
    <global-header v-else :collapsed="collapsed" :onCollapse="onCollapse" />
  </a-layout-header>
</template>

<script>
import TopNavHeader from '@/components/TopNavHeader'
import GlobalHeader from '@/components/GlobalHeader'
import { themeMixin } from '@/mixins'

export default {
  name: 'Header',
  components: {
    TopNavHeader,
    GlobalHeader
  },
  mixins: [ themeMixin ],
  props: {
    collapsed: {
      type: Boolean,
      required: true
    },
    onCollapse: {
      type: Function,
      required: true
    },
    menus: {
      type: Array,
      required: true
    }
  },
  methods: {
    toggle () {
      console.log('sss' + this.collapsed)
      this.onCollapse(!this.collapsed)
    }
  }
}
</script>

<style lang="less" scoped>

</style>
