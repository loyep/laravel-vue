<template>
  <div style="margin: -24px -24px 0;">
    <slot name="top" />
    <page-header
      :title="title"
      :content="content"
      :extraContent="extraContent"
    >
      <template v-if="$slots.logo" v-slot:logo>
        <slot name="logo" />
      </template>
    </page-header>
    <div class="content">
      <grid-content>
        <router-view ref="content" />
      </grid-content>
    </div>
  </div>
</template>

<script>
import PageHeader from '@/components/PageHeader'
import GridContent from './GridContent'
import { themeMixin } from '@/mixins'
export default {
  name: 'PageLayout',
  components: {
    PageHeader,
    GridContent
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
