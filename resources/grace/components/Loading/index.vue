<template>
  <div v-show="isLoading" class="preloading-animate">
    <a-spin size="large" />
  </div>
</template>

<script>

import { Spin } from 'ant-design-vue'
import { mapGetters } from 'vuex'

export default {
  name: 'Loading',
  components: {
    'ASpin': Spin
  },
  computed: {
    ...mapGetters('app', [
      'isLoading'
    ])
  }
}
</script>

<style lang="less" scoped>
    .preloading-animate {
        background: #ffffff;
        width: 100%;
        height: 100%;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 299;

        .ant-spin, div {
            position: absolute;
            width: 5rem;
            height: 5rem;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    }
</style>
