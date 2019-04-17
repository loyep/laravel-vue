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
      <template #pageLogo>
        <slot name="pageLogo" />
      </template>
      <template #pageContent>
        <slot name="pageContent" />
      </template>
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
import { mapGetters } from 'vuex'

export default {
  name: 'PageView',
  components: {
    PageHeader,
    GridContent
  },
  props: {
    hideBread: {
      type: Boolean,
      default: false
    },
    extraContent: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    },
    content: {
      type: String,
      default: ''
    },
    logo: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      hiddenHeader: false
    }
  },
  computed: {
    ...mapGetters('theme', {
      contentWidth: 'contentWidth'
    }),
    wide () {
      return this.contentWidth === 'Fixed'
    }
  },
  watch: {
    '$route' (val, oldVal) {
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

<style lang="scss" scoped>

@import "~@/styles/variables";

.content {
  margin: 24px 24px 0;
}

@media screen and (max-width: $screen-sm) {
  .content {
    margin: 24px 0 0;
  }
}
</style>
