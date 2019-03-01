<template>
  <a-layout-header :style="{ padding: 0, background: '#fff' }">
    <top-nav-header v-if="isTop" />
    <global-header v-if="!isTop" :collapsed="collapsed" :onCollapse="onCollapse" />
  </a-layout-header>
</template>

<script type="text/ecmascript-6">
import TopNavHeader from '@/components/TopNavHeader'
import GlobalHeader from '@/components/GlobalHeader'

export default {
  name: 'Header',
  components: {
    TopNavHeader,
    GlobalHeader
  },
  props: {
    collapsed: {
      type: Boolean,
      required: true
    },
    onCollapse: {
      type: Function,
      required: true
    }
  },
  computed: {
    isMobile () {
      return false
    },
    isTop () {
      return false
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
