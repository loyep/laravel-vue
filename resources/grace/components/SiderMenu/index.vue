<template>
  <a-drawer v-if="isMobile"
            :visible="!collapsed"
            :style="{
              padding: 0,
              height: '100vh',
            }"
            placement="left"
            @close="() => onCollapse(true)"
  >
    <sider-menu
      :menus="menus"
      :mode="mode"
      :collapsed="isMobile ? false : collapsed"
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
import { deviceMixin } from '@/mixins'

export default {
  name: 'SiderMenuWrapper',
  components: {
    SiderMenu,
    'ADrawer': Drawer
  },
  mixins: [deviceMixin],
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
    onSelect (obj) {
      this.$emit('menuSelect', obj)
    }
  }
}
</script>

<style lang="less" scoped>
@import './style.less';

</style>
