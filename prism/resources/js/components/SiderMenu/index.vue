<template>
  <a-drawer
    v-if="isMobile"
    :visible="!collapsed"
    :wrapStyle="{
      padding: 0,
      height: '100vh',
    }"
    :zIndex="10"
    placement="left"
    @close="() => collapse(true)"
  >
    <sider-menu
      :menus="menus"
      :mode="mode"
      :collapsed="(isMobile ? false : isMobile)"
      @select="onSelect"
    />
  </a-drawer>
  <sider-menu v-else :menus="menus" :mode="mode" :collapsed="collapsed" @select="onSelect" />
</template>

<script>
import { Drawer } from 'ant-design-vue'
import SiderMenu from './SiderMenu'
import { mapGetters } from 'vuex'

export default {
  name: 'SiderMenuWrapper',
  components: {
    SiderMenu,
    ADrawer: Drawer
  },
  props: {
    mode: {
      type: String,
      default: 'inline'
    },
    collapsible: {
      type: Boolean,
      default: false
    },
    collapsed: {
      type: Boolean,
      default: false
    },
    menus: {
      type: Array,
      required: true
    }
  },
  computed: {
    ...mapGetters('theme', {
      isMobile: 'isMobile'
    })
  },
  methods: {
    onSelect (obj) {
      this.$emit('menuSelect', obj)
    },

    collapse (collapsed) {
      this.$emit('collapse', collapsed)
    }
  }
}
</script>

<style lang="scss">
.drawer .drawer-content {
  background: #001529;
}
.ant-drawer-left {
  .ant-drawer-body {
    padding: 0;
  }
}
</style>
