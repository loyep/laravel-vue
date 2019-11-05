<template>
  <div>
    <div class="el-layout-sider-logo" :class="{ 'el-layout-sider-logo-dark': siderTheme === 'dark' }">
      <transition name="fade">
        <a v-show="!hideLogo" to="/">
          <img v-if="menuCollapse" src="@assets/images/logo-small.png">
          <img v-else-if="siderTheme === 'light'" src="@assets/images/logo.png">
          <img v-else src="@assets/images/logo-dark.png">
        </a>
      </transition>
    </div>
  </div>
</template>

<script>
import {
  mapState
  // mapGetters
} from 'vuex'
export default {
  name: 'MenuSide',
  props: {
    hideLogo: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    ...mapState('layout', [
      'siderTheme',
      'menuAccordion',
      'menuCollapse'
    ])
    // ...mapState('menu', [
    //   'activePath',
    //   'openNames'
    // ]),
    // ...mapGetters('menu', [
    //   'filterSider'
    // ])
  }
}
</script>
