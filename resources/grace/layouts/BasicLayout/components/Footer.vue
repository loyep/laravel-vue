<template>
  <a-layout-footer :style="{ padding: 0 }">
    <global-footer :links="[
      {
        key: 'github',
        icon: 'github',
        path: 'https://github.com/loyep/grace',
        blankTarget: true
      }
    ]"
    >
      <template v-slot:copyright>
        Copyright <a-icon type="copyright" /> {{ year }} Power By <a href="https://github.com/loyep/grace">
          Grace
        </a>
      </template>
    </global-footer>
  </a-layout-footer>
</template>

<script>

import { Layout } from 'ant-design-vue'
import GlobalFooter from '@/components/GlobalFooter'

export default {
  name: 'Footer',
  components: {
    GlobalFooter,
    'ALayoutFooter': Layout.Footer
  },
  data () {
    return {
      'year': new Date().getFullYear()
    }
  }
}
</script>

<style lang="less" scoped>

</style>
