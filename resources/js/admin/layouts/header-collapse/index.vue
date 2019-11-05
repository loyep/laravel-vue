<template>
  <span class="el-layout-header-trigger" :class="{ 'el-layout-header-trigger-min': showReload }" @click="handleToggleMenuSide">
    <i v-show="menuCollapse || isMobile" class="el-icon-s-unfold" />
    <i v-show="!menuCollapse && !isMobile" class="el-icon-s-fold" />
  </span>
</template>
<script>
import { mapState, mapMutations } from 'vuex'

export default {
  name: 'HeaderCollapse',
  computed: {
    ...mapState('layout', [
      'isMobile',
      'isTablet',
      'isDesktop',
      'menuCollapse',
      'showReload'
    ])
  },
  watch: {
    // 切换页面时，在移动端自动收起侧边栏
    // 强行传参 false 是因为有的路由不是在菜单栏发生的，toggle 会使其显示
    '$route'() {
      if (this.isMobile) this.handleToggleMenuSide(false)
    },
    // 在平板时自动收起菜单
    isTablet(state) {
      if (!this.isMobile && state) this.updateMenuCollapse(true)
    },
    // 在桌面时自动展开菜单
    isDesktop(state) {
      if (!this.isMobile && state) this.updateMenuCollapse(false)
    }
  },
  methods: {
    ...mapMutations('layout', [
      'updateMenuCollapse'
    ]),
    // 展开/收起侧边栏
    handleToggleMenuSide(state) {
      if (this.isMobile) {
        this.updateMenuCollapse(false)
        this.$emit('on-toggle-drawer', state)
      } else {
        this.updateMenuCollapse(!this.menuCollapse)
      }
    }
  }
}
</script>
