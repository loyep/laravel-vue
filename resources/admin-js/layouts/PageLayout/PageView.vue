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
  data () {
    return {
      hiddenHeader: false
    }
  },
  computed: {
    wide () {
      return this.contentWidth === 'Fixed'
    }
  },
  watch: {
    $route () {
      if (this.$route.meta && this.$route.meta.hiddenHeader) {
        this.hiddenHeader = true
      } else {
        this.hiddenHeader = false
      }
    }
  },
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
