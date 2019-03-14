<template>
  <!-- <a-card :loading="loading" :bodyStyle="{ padding: '20px 24px 8px 24px' }"> -->
  <!-- <div class="chartCard"> -->
  <!-- <div :class="{ -->
  <!-- chartTop: true, -->
  <!-- chartTopMargin: !$slots.default && !$slots.footer -->
  <!-- }" -->
  <!-- > -->
  <!-- <div class="avatar"> -->
  <!-- {{ avatar }} -->
  <!-- </div> -->
  <!-- <div class="metaWrap"> -->
  <!-- <div class="meta"> -->
  <!-- <span class="title">{{ title }}</span> -->
  <!-- <span class="action"> -->
  <!-- <slot name="action" /> -->
  <!-- </span> -->
  <!-- </div> -->
  <!-- <div class="total"> -->
  <!-- <span>300</span> -->
  <!-- </div> -->
  <!-- </div> -->
  <!-- </div> -->
  <!-- <div v-if="$slots.default" class="content" :style="{ height: (contentHeight !== null ? contentHeight : 'auto') }"> -->
  <!-- <div :class="{ contentFixed: contentHeight !== null }"> -->
  <!-- <slot /> -->
  <!-- </div> -->
  <!-- </div> -->
  <!-- <div v-if="$slots.footer" :class="{ footer: true, footerMargin: !$slots.default}"> -->
  <!-- <slot name="footer" /> -->
  <!-- </div> -->
  <!-- </div> -->
  <!-- </a-card> -->
  <a-card :bordered="bordered" :bodyStyle="{ padding: '20px 24px 8px 24px' }">
    <div class="chartCard">
      <div :class="{
        chartTop: true,
        chartTopMargin: !$slots.default && !$slots.footer
      }"
      >
        <div class="avatar">
          {{ avatar }}
        </div>
        <div class="metaWrap">
          <div class="meta">
            <span>
              <span>
                {{ title }}
              </span>
            </span>
            <span class="action">
              <slot name="action" />
            </span>
          </div>
          <div class="total">
            <span>
              {{ total }}
            </span>
          </div>
        </div>
      </div>
      <div v-if="$slots.default" class="content" :style="{ height: (contentHeight !== null ? `${contentHeight}px` : 'auto') }">
        <div :class="{ contentFixed: contentHeight !== null }">
          <slot />
        </div>
      </div>
      <div v-if="$slots.footer" :class="{ footer: true, footerMargin: !$slots.default}">
        <slot name="footer" />
      </div>
      <!-- <div class="footer">
        <div class="antd-pro-components-charts-field-index-field">
          <span class="antd-pro-components-charts-field-index-label">
            <span>
              日销售额
            </span>
          </span>
          <span class="antd-pro-components-charts-field-index-number">
            ￥12,423
          </span>
        </div>
      </div> -->
    </div>
  </a-card>
</template>

<script>
import { Card } from 'ant-design-vue'
export default {
  name: 'ChartCard',
  components: {
    'ACard': Card
  },
  props: {
    bordered: {
      type: Boolean,
      default: true
    },
    title: {
      type: String,
      default: ''
    },
    avatar: {
      type: String,
      default: ''
    },
    total: {
      type: [String, Number],
      default: ''
    },
    contentHeight: {
      type: Number,
      default: null,
      required: false
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

.chartCard {
  position: relative;
  .chartTop {
    position: relative;
    width: 100%;
    overflow: hidden;
  }
  .chartTopMargin {
    margin-bottom: 12px;
  }
  .chartTopHasMargin {
    margin-bottom: 20px;
  }
  .metaWrap {
    float: left;
  }
  .avatar {
    position: relative;
    top: 4px;
    float: left;
    margin-right: 20px;
    img {
      border-radius: 100%;
    }
  }
  .meta {
    height: 22px;
    color: @text-color-secondary;
    font-size: @font-size-base;
    line-height: 22px;
  }
  .action {
    position: absolute;
    top: 4px;
    right: 0;
    line-height: 1;
    cursor: pointer;
  }
  .total {
    height: 38px;
    margin-top: 4px;
    margin-bottom: 0;
    overflow: hidden;
    color: @heading-color;
    font-size: 30px;
    line-height: 38px;
    white-space: nowrap;
    text-overflow: ellipsis;
    word-break: break-all;
  }
  .content {
    position: relative;
    width: 100%;
    margin-bottom: 12px;
  }
  .contentFixed {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
  }
  .footer {
    margin-top: 8px;
    padding-top: 9px;
    border-top: 1px solid @border-color-split;
    & > * {
      position: relative;
    }
  }
  .footerMargin {
    margin-top: 20px;
  }
}

</style>
