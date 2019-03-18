<template>
  <div style="margin: -24px -24px 0;">
    <slot name="top" />
    <page-header
      v-if="!hiddenHeader"
      :hideBread="hideBread"
      :logo="logo"
      :title="title"
      :content="content"
      :extraContent="extraContent"
      :wide="wide"
    >
      <template v-if="$slots.logo" v-slot:logo>
        <slot name="logo" />
      </template>
      <slot slot="content" name="headerContent" />
    </page-header>
    <div class="content">
      <grid-content>
        <slot />
      </grid-content>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue, Prop, Watch } from 'vue-property-decorator';
import { State, Mutation, namespace } from 'vuex-class';
import PageHeader from '@/components/PageHeader/index.vue'
import GridContent from './GridContent.vue'
// import { themeMixin } from '@/mixins'

const themeModule = namespace('theme');

@Component({
  components: {
    PageHeader,
    GridContent
  }
})
export default class PageView extends Vue {
  @Prop({ default: false})
  hideBread: boolean

  @Prop({ default: ''})
  extraContent: string

  @Prop({ default: ''})
  title: string

  @Prop({ default: ''})
  content: string

  @Prop({ default: ''})
  logo: string

  private hiddenHeader: boolean = false

  @themeModule.Getter('contentWidth')
  contentWidth: string

  get wide() {
    return this.contentWidth === 'Fixed'
  }

  @Watch('$route')
  onRouteChanged(val: string, oldVal: string) { 
    if (this.$route.meta && this.$route.meta.hiddenHeader) {
      this.hiddenHeader = true
    } else {
      this.hiddenHeader = false
    }
  }

  mounted () {
    if (this.$route.meta && this.$route.meta.hiddenHeader) {
      this.hiddenHeader = true
    } else {
      this.hiddenHeader = false
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
