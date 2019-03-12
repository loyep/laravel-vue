<template>
  <div style="margin: -24px -24px 0;">
    <slot name="top" />
    <page-header
      :hideBread="hideBread"
      :logo="logo"
      :title="title"
      :content="content"
      :extraContent="extraContent"
      :wide="!wide"
    >
      <template v-if="$slots.logo" v-slot:logo>
        <slot name="logo" />
      </template>
      <slot slot="content" name="headerContent" />
    </page-header>
    <div class="content">
      <grid-content :wide="!wide">
        <slot />
      </grid-content>
    </div>
  </div>
</template>

<script>
import PageHeader from '@/components/PageHeader'
import GridContent from './GridContent'
import { themeMixin } from '@/mixins'
export default {
  name: 'PageView',
  components: {
    PageHeader,
    GridContent
  },
  mixins: [ themeMixin ],
  props: {
    hideBread: {
      type: Boolean,
      default: false
    },
    extraContent: {
      type: String,
      default: null
    },
    title: {
      type: String,
      default: null
    },
    content: {
      type: String,
      default: null
    },
    logo: {
      type: String,
      default: null
    }
  },
  computed: {
    wide () {
      console.log(this.contentWidth)
      return !(this.isTopMenu && this.contentWidth === 'Fixed')
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
