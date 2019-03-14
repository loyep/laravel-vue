<template>
  <a-layout-header v-show="visible" :style="{ 'padding': 0, 'width': getHeadWidth }" :class="{ 'fixedHeader': fixedHeader }">
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
  data () {
    return {
      oldScrollTop: 0,
      ticking: false,
      visible: true
    }
  },
  computed: {
    getHeadWidth () {
      if (this.isMobile || !this.fixedHeader || this.isTopMenu) {
        return '100%'
      }
      return this.collapsed ? 'calc(100% - 80px)' : 'calc(100% - 256px)'
    }
  },
  beforeDestroy () {
    document.removeEventListener('scroll', this.handScroll)
  },
  mounted () {
    document.addEventListener('scroll', this.handScroll, { passive: true })
  },
  methods: {
    handScroll () {
      if (this.autoHideHeader) {
        var that = this
        const scrollTop = document.body.scrollTop + document.documentElement.scrollTop
        const visible = this.visible
        const numSlideFun = () => {
          if (that.oldScrollTop > scrollTop) {
            that.visible = true
          } else if (scrollTop > 300 && visible) {
            that.visible = false
          } else if (scrollTop < 300 && !visible) {
            that.visible = true
          }
          that.oldScrollTop = scrollTop
          requestAnimationFrame(numSlideFun)
        }
        numSlideFun()
      }
    },
    toggle () {
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
  // transition: width 0.1s;
}
</style>
