<template>
  <div class="pageHeader">
    <div :class="{ wide: wide }">
      <!-- <a-skeleton :loading="loading" active :paragraph="{rows: 4}" :avatar="{ size: 'large', shape: 'circle' }"> -->
      <breadcrumb v-if="!hideBread" />
      <div class="detail">
        <img v-if="logo" :src="logo" class="logo">
        <div class="main">
          <div class="row">
            <h1 v-if="title" class="title">
              {{ title }}
            </h1>
          </div>
          <div class="row">
            <div v-if="content" class="content">
              {{ content }}
            </div>
            <div v-if="extraContent" class="extraContent">
              {{ extraContent }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script >
import { Skeleton } from 'ant-design-vue'
import Breadcrumb from './Breadcrumb'
import { themeMixin } from '@/mixins'

export default {
  name: 'PageHeader',
  components: {
    'ASkeleton': Skeleton,
    Breadcrumb
  },
  mixins: [ themeMixin ],
  props: {
    wide: {
      type: Boolean,
      required: true
    },
    hideBread: {
      type: Boolean,
      default: false
    },
    logo: {
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
    extraContent: {
      type: String,
      default: null
    }
  },
  data () {
    return {
      loading: false
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.pageHeader {
  padding: 16px 32px 0 32px;
  background: @component-background;
  border-bottom: @border-width-base @border-style-base @border-color-split;
  .wide {
    max-width: 1200px;
    margin: auto;
  }
  .detail {
    display: flex;
  }

  .row {
    display: flex;
    width: 100%;
  }

  .breadcrumb {
    margin-bottom: 16px;
  }

  .tabs {
    margin: 0 0 0 -8px;

    :global {
      // 1px 可以让选中效果显示完成
      .ant-tabs-bar {
        margin-bottom: 1px;
        border-bottom: none;
      }
    }
  }

  .logo {
    flex: 0 1 auto;
    margin-right: 16px;
    padding-top: 1px;
    > img {
      display: block;
      width: 28px;
      height: 28px;
      border-radius: @border-radius-base;
    }
  }

  .title {
    color: @heading-color;
    font-weight: 500;
    font-size: 20px;
  }

  .action {
    min-width: 266px;
    margin-left: 56px;

    :global {
      .ant-btn-group:not(:last-child),
      .ant-btn:not(:last-child) {
        margin-right: 8px;
      }

      .ant-btn-group > .ant-btn {
        margin-right: 0;
      }
    }
  }

  .title,
  .content {
    flex: auto;
  }

  .action,
  .extraContent,
  .main {
    flex: 0 1 auto;
  }

  .main {
    width: 100%;
  }

  .title,
  .action {
    margin-bottom: 16px;
  }

  .logo,
  .content,
  .extraContent {
    margin-bottom: 16px;
  }

  .action,
  .extraContent {
    text-align: right;
  }

  .extraContent {
    min-width: 242px;
    margin-left: 88px;
  }
}

@media screen and (max-width: @screen-xl) {
  .pageHeader {
    .extraContent {
      margin-left: 44px;
    }
  }
}

@media screen and (max-width: @screen-lg) {
  .pageHeader {
    .extraContent {
      margin-left: 20px;
    }
  }
}

@media screen and (max-width: @screen-md) {
  .pageHeader {
    .row {
      display: block;
    }

    .action,
    .extraContent {
      margin-left: 0;
      text-align: left;
    }
  }
}

@media screen and (max-width: @screen-sm) {
  .pageHeader {
    .detail {
      display: block;
    }
  }
}

@media screen and (max-width: @screen-xs) {
  .pageHeader {
    .action {
      :global {
        .ant-btn-group,
        .ant-btn {
          display: block;
          margin-bottom: 8px;
        }
        .ant-btn-group > .ant-btn {
          display: inline-block;
          margin-bottom: 0;
        }
      }
    }
  }
}

</style>
