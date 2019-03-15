<template>
  <div class="field">
    <span class="label">{{ label }}</span>
    <span class="number">{{ value }}</span>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      default: ''
    },
    value: {
      type: String,
      default: ''
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.field {
  margin: 0;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  .label,
  .number {
    font-size: @font-size-base;
    line-height: 22px;
  }
  .number {
    margin-left: 8px;
    color: @heading-color;
  }
}

</style>
