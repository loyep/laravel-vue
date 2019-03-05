<template>
  <a-dropdown
    :placement="placement"
    :overlayClassName="'container ' + overlayClassName "
    :trigger="triggerType"
    :visible="visible"
    @visibleChange="visibleChange"
  >
    <slot />
    <template slot="overlay">
      <slot name="overlay" />
    </template>
  </a-dropdown>
</template>

<script>
import { Dropdown } from 'ant-design-vue'

export default {
  name: 'HeaderDropdown',
  components: {
    'ADropdown': Dropdown
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.container > * {
  background-color: #fff;
  border-radius: 4px;
  box-shadow: @shadow-1-down;
}

@media screen and (max-width: @screen-xs) {
  .container {
    width: 100% !important;
  }
  .container > * {
    border-radius: 0 !important;
  }
}
</style>
