<template>
  <div class="pageHeader">
    <div :class="{ wide: wide }">
      <a-breadcrumb>
        <a-breadcrumb-item v-for="(item, index) in breadList" :key="index">
          <router-link v-if="index !== breadList.length - 1" :to="{ path: item.path }" class="bread-title">
            {{ generateTitle(item.meta.title) }}
          </router-link>
          <span v-else class="bread-title">
            {{ item.meta.title }}
          </span>
        </a-breadcrumb-item>
      </a-breadcrumb>
      <div class="detail">
        <div class="main">
          <div class="row">
            <h1 class="title">
              {{ title }}
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Breadcrumb } from 'ant-design-vue'
export default {
  name: 'PageHeader',

  components: {
    'a-breadcrumb': Breadcrumb,
    'a-breadcrumb-item': Breadcrumb.Item
  },

  data () {
    return {
      breadList: [],
      title: '',
      action: 'action',
      content: '表单页用于向用户收集或验证信息，基础表单常见于数据项较少的表单场景。',
      wide: false
    }
  },

  created () {
    this.getBreadcrumb()
  },

  methods: {
    generateTitle (title) {
      const hasKey = this.$te('route.' + title)

      if (hasKey) {
        // $t :this method from vue-i18n, inject in @/lang/index.js
        const translatedTitle = this.$t('route.' + title)

        return translatedTitle
      }
      return title
    },
    getBreadcrumb () {
      let matched = this.$route.matched.filter(item => item.name)

      const first = matched[0]
      if (first && first.name.trim().toLocaleLowerCase() !== 'Dashboard'.toLocaleLowerCase()) {
        matched = [{ path: '/', meta: { title: 'dashboard' }, name: 'Dashboard' }].concat(matched)
      }

      this.breadList = matched.filter(item => item.meta && item.meta.title && item.meta.breadcrumb !== false)
      this.title = this.breadList[this.breadList.length - 1].meta.title
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

.bread-title {
    text-transform: capitalize;
}
.main {
  width: 100%;
  height: 100%;
  min-height: 100%;
  transition: 0.3s;
  &.wide {
    max-width: 1200px;
    margin: 0 auto;
  }
}

</style>
