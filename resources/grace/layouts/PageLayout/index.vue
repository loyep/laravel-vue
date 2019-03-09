<template>
  <page-view :title="title" :extraContent="extraContent" :content="content" :logo="logo">
    <router-view ref="content" />
  </page-view>
</template>

<script>
import PageView from './PageView'
import { themeMixin } from '@/mixins'
export default {
  name: 'PageLayout',
  components: {
    PageView
  },
  mixins: [ themeMixin ],
  data () {
    return {
      extraContent: null,
      title: null,
      content: null,
      logo: null
    }
  },
  mounted () {
    this.getPageHeaderInfo()
  },
  updated () {
    this.getPageHeaderInfo()
  },
  methods: {
    getPageHeaderInfo () {
      this.title = this.$route.meta.title
      let content = this.$refs.content
      if (content) {
        if (content.$children[0]) {
          content = content.$children[0]
        }
      }
      if (content && content.headerInfo) {
        this.extraContent = content.headerInfo.extraContent
        if (content.headerInfo.title) {
          this.title = content.headerInfo.title
        }
        this.content = content.headerInfo.content
        this.logo = content.headerInfo.logo
      }
    }
  }
}
</script>

<style lang="less" scoped>

@import '~@/styles/variables.less';

.content {
  margin: 24px 24px 0;
}

@media screen and (max-width: @screen-sm) {
  .content {
    margin: 24px 0 0;
  }
}
</style>
