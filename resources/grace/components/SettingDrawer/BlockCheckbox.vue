<template>
  <div :key="value" class="blockChecbox">
    <a-tooltip v-for="item in list" :key="item.key" :title="title">
      <div class="item" @click="onChange(item.key)">
        <img :src="item.url" :alt="item.key">
        <div
          class="selectIcon"
          :style="{
            display: value === item.key ? 'block' : 'none',
          }"
        >
          <a-icon type="check" />
        </div>
      </div>
    </a-tooltip>
  </div>
</template>

<script>
export default {
  name: 'BlockCheckbox',
  components: {
  },
  props: {
    title: {
      type: String,
      default: ''
    },
    value: {
      type: String,
      default: ''
    },
    list: {
      type: Array,
      default: function () {
        return []
      }
    }
  },
  methods: {
    onChange (key) {
      this.$emit('change', key)
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.blockChecbox {
  display: flex;
  .item {
    position: relative;
    margin-right: 16px;
    // box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
    border-radius: @border-radius-base;
    cursor: pointer;
    img {
      width: 48px;
    }
  }
  .selectIcon {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    padding-top: 15px;
    padding-left: 24px;
    color: @primary-color;
    font-weight: bold;
    font-size: 14px;
  }
}
</style>
