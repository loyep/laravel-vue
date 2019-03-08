<template>
  <div style="margin: -24px -24px 0;">
    <slot name="top" />
    <page-header
      :title="title"
      :content="content"
      :extraContent="extraContent"
      :wide="wide"
    >
      <template v-if="$slots.logo" v-slot:logo>
        <slot name="logo" />
      </template>
    </page-header>
    <div v-if="$slots.default" class="content">
      <grid-content>
        <slot />
      </grid-content>
    </div>
  </div>
</template>

<script>
import PageHeader from '@/components/PageHeader'
import GridContent from './GridContent'

export default {
  name: 'PageHeaderWrapper',
  components: {
    PageHeader,
    GridContent
  },
  props: {
    title: {
      type: String,
      default: null
    },
    content: {
      type: String,
      default: null
    },
    extraContent: {
      type: String,
      default: null
    },
    wide: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return { }
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
