<template>
  <grid-content>
    <a-row :gutter="24">
      <a-col
        :xs="24"
        :sm="12"
        :md="12"
        :lg="12"
        :xl="6"
        style="margin-bottom: 24px;"
      >
        <chart-card
          title="用户量"
          :contentHeight="46"
          :bordered="false"
          :total="user.total"
        >
          <template v-slot:action>
            <a-tooltip title="用户数">
              <a-icon type="info-circle-o" />
            </a-tooltip>
          </template>

          <trend style="margin-right: 16;">
            <!-- 新增 -->
            <!-- <span class="trendText">{{ user.remark }}</span> -->
          </trend>

          <template v-slot:footer>
            <field
              label="新增"
              :value="user.increased"
            />
          </template>
        </chart-card>
      </a-col>
      <!-- <a-col
        :xs="24"
        :sm="12"
        :md="12"
        :lg="12"
        :xl="6"
        style="margin-bottom: 24px;"
      >
        <chart-card
          :title="item.title"
          :contentHeight="46"
          :bordered="false"
          :total="item.total"
        >
          <template v-slot:action>
            <a-tooltip :title="item.title">
              <a-icon type="info-circle-o" />
            </a-tooltip>
          </template>

          <template v-slot:footer>
            <field
              label="新增"
              :value="item.remark"
            />
          </template>

          <trend :flag="item.trend" style="margin-right: 16;">
            新增
            <span class="trendText">{{ item.remark }}</span>
          </trend>
        </chart-card>
      </a-col>
      <a-col
        :xs="24"
        :sm="12"
        :md="12"
        :lg="12"
        :xl="6"
        style="margin-bottom: 24px;"
      >
        <chart-card
          :title="item.title"
          :contentHeight="46"
          :bordered="false"
          :total="item.total"
        >
          <template v-slot:action>
            <a-tooltip :title="item.title">
              <a-icon type="info-circle-o" />
            </a-tooltip>
          </template>

          <template v-slot:footer>
            <field
              label="新增"
              :value="item.remark"
            />
          </template>

          <trend :flag="item.trend" style="margin-right: 16;">
            新增
            <span class="trendText">{{ item.remark }}</span>
          </trend>
        </chart-card>
      </a-col>
      <a-col
        :xs="24"
        :sm="12"
        :md="12"
        :lg="12"
        :xl="6"
        style="margin-bottom: 24px;"
      >
        <chart-card
          :title="item.title"
          :contentHeight="46"
          :bordered="false"
          :total="item.total"
        >
          <template v-slot:action>
            <a-tooltip :title="item.title">
              <a-icon type="info-circle-o" />
            </a-tooltip>
          </template>

          <template v-slot:footer>
            <field
              label="新增"
              :value="item.remark"
            />
          </template>

          <trend :flag="item.trend" style="margin-right: 16;">
            新增
            <span class="trendText">{{ item.remark }}</span>
          </trend>
        </chart-card>
      </a-col> -->
    </a-row>
    <!-- <div class="twoColLayout">
      <a-row :gutter="24">
        <a-col :xl="12" :lg="24" :md="24" :sm="24" :xs="24">
          <chart-card>twoColLayout</chart-card>
        </a-col>
        <a-col :xl="12" :lg="24" :md="24" :sm="24" :xs="24" />
      </a-row>
    </div> -->
  </grid-content>
</template>

<script>
import { Row, Col, Tooltip } from 'ant-design-vue'
import GridContent from '@/layouts/PageLayout/GridContent'
import ChartCard from '@/components/Charts/ChartCard'
import Trend from '@/components/Trend'
import Field from '@/components/Charts/Field'
import { statistics } from '@/api/app'

export default {
  name: 'Analysis',
  components: {
    'ARow': Row,
    'ACol': Col,
    'ATooltip': Tooltip,
    ChartCard,
    GridContent,
    Trend,
    Field
  },
  data () {
    return {
      user: {
        total: 0,
        trend: ' ',
        increased: '0'
      }
    }
  },
  mounted () {
    this.getStatistics()
  },
  methods: {
    getStatistics () {
      statistics().then(res => {
        console.log(res)
        this.updateTotal(res.data.user.total)
      })
    },
    updateTotal (total, key) {
      var that = this
      let numText = this.user.total
      const step = Math.ceil(total / 60)
      let golb
      function numSlideFun () {
        numText += step
        if (numText >= total) {
          numText = total
          cancelAnimationFrame(golb)
        } else {
          golb = requestAnimationFrame(numSlideFun)
        }
        that.user.total = numText
      }
      numSlideFun() // 调用数字动画
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';
@import '~@/styles/components/utils.less';

.iconGroup {
  i {
    margin-left: 16px;
    color: @text-color-secondary;
    cursor: pointer;
    transition: color 0.32s;
    &:hover {
      color: @text-color;
    }
  }
}

.rankingList {
  margin: 25px 0 0;
  padding: 0;
  list-style: none;
  li {
    .clearfix();

    display: flex;
    align-items: center;
    margin-top: 16px;
    span {
      color: @text-color;
      font-size: 14px;
      line-height: 22px;
    }
    .rankingItemNumber {
      display: inline-block;
      width: 20px;
      height: 20px;
      margin-top: 1.5px;
      margin-right: 16px;
      font-weight: 600;
      font-size: 12px;
      line-height: 20px;
      text-align: center;
      background-color: @background-color-base;
      border-radius: 20px;
      &.active {
        color: #fff;
        background-color: #314659;
      }
    }
    .rankingItemTitle {
      flex: 1;
      margin-right: 8px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
  }
}

.salesExtra {
  display: inline-block;
  margin-right: 24px;
  a {
    margin-left: 24px;
    color: @text-color;
    &:hover {
      color: @primary-color;
    }
    &.currentDate {
      color: @primary-color;
    }
  }
}

.salesCard {
  .salesBar {
    padding: 0 0 32px 32px;
  }
  .salesRank {
    padding: 0 32px 32px 72px;
  }
  :global {
    .ant-tabs-bar {
      padding-left: 16px;
      .ant-tabs-nav .ant-tabs-tab {
        padding-top: 16px;
        padding-bottom: 14px;
        line-height: 24px;
      }
    }
    .ant-tabs-extra-content {
      padding-right: 24px;
      line-height: 55px;
    }
    .ant-card-head {
      position: relative;
    }
    .ant-card-head-title {
      align-items: normal;
    }
  }
}

.salesCardExtra {
  height: inherit;
}

.salesTypeRadio {
  position: absolute;
  right: 54px;
  bottom: 12px;
}

.offlineCard {
  :global {
    .ant-tabs-ink-bar {
      bottom: auto;
    }
    .ant-tabs-bar {
      border-bottom: none;
    }
    .ant-tabs-nav-container-scrolling {
      padding-right: 40px;
      padding-left: 40px;
    }
    .ant-tabs-tab-prev-icon::before {
      position: relative;
      left: 6px;
    }
    .ant-tabs-tab-next-icon::before {
      position: relative;
      right: 6px;
    }
    .ant-tabs-tab-active h4 {
      color: @primary-color;
    }
  }
}

.twoColLayout {
  .salesCard {
    height: calc(100% - 24px);
  }
  div[class^='ant-col']:last-child {
    position: absolute\9;
    right: 0\9;
    height: 100%\9;
  }
  :global {
    .ant-row {
      position: relative\9;
      display: flex;
      display: block\9;
      flex-flow: row wrap;
    }
  }
}

.trendText {
  margin-left: 8px;
  color: @heading-color;
}

@media screen and (max-width: @screen-lg) {
  .salesExtra {
    display: none;
  }

  .rankingList {
    li {
      span:first-child {
        margin-right: 8px;
      }
    }
  }
}

@media screen and (max-width: @screen-md) {
  .rankingTitle {
    margin-top: 16px;
  }

  .salesCard .salesBar {
    padding: 16px;
  }
}

@media screen and (max-width: @screen-sm) {
  .salesExtraWrap {
    display: none;
  }

  .salesCard {
    :global {
      .ant-tabs-content {
        padding-top: 30px;
      }
    }
  }
}

</style>
