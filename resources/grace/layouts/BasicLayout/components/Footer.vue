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
      <template slot="copyright">
        Copyright <a-icon type="copyright" /> {{ year }} Power By <a href="https://github.com/loyep/grace">
          Grace
        </a>
      </template>
    </global-footer>
  </a-layout-footer>
</template>

<script type="text/ecmascript-6">

import GlobalFooter from '@/components/GlobalFooter'

export default {
  name: 'Footer',
  components: {
    GlobalFooter
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
