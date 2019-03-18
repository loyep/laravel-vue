<template>
  <page-view :title="title" :extraContent="extraContent" :content="content" :logo="logo">
    <router-view ref="content"/>
  </page-view>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { State, Mutation, namespace } from 'vuex-class';
import PageView from './PageView.vue'

const themeModule = namespace('theme');

@Component({
  components: {
    PageView
  }
})
export default class PageLayout extends Vue {

  private extraContent: string = ''
  
  private title: string = ''
  
  private content: string = ''
  
  private logo: string = ''

  mounted () {
    this.getPageHeaderInfo()
  }

  updated () {
    this.getPageHeaderInfo()
  }
  
  getPageHeaderInfo () {
    this.title = this.$route.meta.title
    let content: any = this.$refs.content
    if (content) {
      if ((<any>content).$children[0]) {
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
</script>

<style lang="less" scoped>
@import "~@/styles/variables.less";

.content {
  margin: 24px 24px 0;
}

@media screen and (max-width: @screen-sm) {
  .content {
    margin: 24px 0 0;
  }
}
</style>
