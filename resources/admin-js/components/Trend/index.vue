<template>
  <div :class="{
         trendItem: true,
         trendItemGrey: !colorful,
         reverseColor: false
       }"
       style="margin-right: 16px;"
  >
    <span>
      <slot />
    </span>
    <span v-if="flag" :class="flag">
      <a-icon :type="`caret-${flag}`" />
    </span>
  </div>
</template>

<script>
export default {
  name: 'Trend',
  components: {
  },
  props: {
    colorful: {
      type: Boolean,
      default: true
    },
    flag: {
      type: String,
      required: false,
      default: null
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.trendItem {
  display: inline-block;
  font-size: @font-size-base;
  line-height: 22px;

  .up,
  .down {
    position: relative;
    top: 1px;
    margin-left: 4px;
    i {
      font-size: 12px;
      transform: scale(0.83);
    }
  }
  .up {
    color: @red-6;
  }
  .down {
    top: -1px;
    color: @green-6;
  }

  &.trendItemGrey .up,
  &.trendItemGrey .down {
    color: @text-color;
  }

  &.reverseColor .up {
    color: @green-6;
  }
  &.reverseColor .down {
    color: @red-6;
  }
}

</style>
