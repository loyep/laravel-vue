<template>
  <span v-if="isDesktop" class="el-layout-header-trigger el-layout-header-trigger-min el-layout-header-trigger-in el-layout-header-trigger-nohover">
    <input class="el-layout-header-search" type="text" placeholder="搜索...">
  </span>
  <span v-else class="el-layout-header-trigger el-layout-header-trigger-min">
    <el-dropdown ref="dropdown" trigger="click" class="el-layout-header-search-drop">
      <i class="el-icon-search" />
      <el-dropdown-menu slot="dropdown">
        <div class="el-layout-header-search-drop-main">
          <el-input size="medium" prefix-icon="el-icon-search" type="text" placeholder="搜索..." />
          <span class="el-layout-header-search-drop-main-cancel" @click="handleCloseSearch">取消</span>
        </div>
      </el-dropdown-menu>
    </el-dropdown>
  </span>
</template>
<script>
import { mapState } from 'vuex'

export default {
  name: 'HeaderSearch',
  computed: {
    ...mapState('layout', [
      'isDesktop',
      'headerMenu'
    ])
  },
  methods: {
    handleCloseSearch() {
      this.$refs.dropdown.handleClick()
    }
  }
}
</script>
