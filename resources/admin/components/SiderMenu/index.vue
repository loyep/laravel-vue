<template>
  <a-drawer
    v-if="isMobile"
    :visible="!collapsed"
    :wrapStyle="{
      padding: 0,
      height: '100vh',
    }"
    zIndex="10"
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
  <sider-menu v-else
              :menus="menus"
              :mode="mode"
              :collapsed="collapsed"
              @select="onSelect"
  />
</template>

<script>
import { Drawer } from 'ant-design-vue'
import SiderMenu from './SiderMenu'
import { themeMixin } from '@/mixins'

export default {
  name: 'SiderMenuWrapper',
  components: {
    SiderMenu,
    'ADrawer': Drawer
  },
  mixins: [ themeMixin ],
  props: {
    mode: {
      type: String,
      required: false,
      default: 'inline'
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
    onSelect (obj) {
      this.$emit('menuSelect', obj)
    },
    collapse (collapsed) {
      this.$emit('collapse', collapsed)
    }
  }
}
</script>

<style lang="less">

.drawer .drawer-content {
  background: #001529;
}
.ant-drawer-left {
  .ant-drawer-body {
    padding: 0;
  }
}

</style>
