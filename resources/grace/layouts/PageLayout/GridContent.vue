<template>
  <div :class="{ 'main': true, wide: wide }">
    <slot />
  </div>
</template>

<script>
import { themeMixin } from '@/mixins'

export default {
  name: 'GridContent',
  mixins: [ themeMixin ],
  props: {
    wide: {
      type: Boolean,
      required: true
    }
  }
}
</script>

<style lang="less" scoped>
.main {
  width: 100%;
  height: 100%;
  min-height: 100%;
  transition: 0.3s;
  &.wide {
    max-width: 1200px;
    margin: 0 auto;
  }
}

</style>
