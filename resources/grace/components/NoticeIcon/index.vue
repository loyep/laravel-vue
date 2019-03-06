<template>
  <a-dropdown
    v-model="visible"
    placement="bottomRight"
    overlayClassName="notice-container notice-popover"
    :trigger="['click']"
  >
    <span>
      <a-badge :count="count" :style="{ boxShadow: 'none' }" class="badge">
        <a-icon type="bell" class="icon" />
      </a-badge>
    </span>
    <template v-slot:overlay>
      <a-spin :spinning="false" :delay="0">
        <a-tabs class="notice-tabs">
          <a-tab-pane key="1" tab="通知(0)">
            <notice-list emptyText="暂无通知" emptyImage="https://gw.alipayobjects.com/zos/rmsportal/wAhyIChODzsoKIOBHcBk.svg" />
          </a-tab-pane>
          <a-tab-pane key="2" tab="消息(0)">
            <notice-list emptyText="暂无消息" emptyImage="https://gw.alipayobjects.com/zos/rmsportal/sAuJeJzSKbUmHfBQRzmZ.svg" />
          </a-tab-pane>
          <a-tab-pane key="3" tab="待办(0)">
            <notice-list emptyText="暂无待办" emptyImage="https://gw.alipayobjects.com/zos/rmsportal/HsIsxMZiWKrNUavQUXqx.svg" />
          </a-tab-pane>
        </a-tabs>
      </a-spin>
    </template>
  </a-dropdown>
</template>

<script>
import { Badge, Dropdown, Icon, Spin, Tabs } from 'ant-design-vue'
import NoticeList from './NoticeList'
export default {
  name: 'NoticeIcon',
  components: {
    NoticeList,
    'ABadge': Badge,
    'ADropdown': Dropdown,
    'AIcon': Icon,
    'ASpin': Spin,
    'ATabs': Tabs,
    'ATabPane': Tabs.TabPane
  },
  data () {
    return {
      visible: false,
      loading: false,
      count: 0
    }
  },
  methods: {
    onTabChange () {

    }
  }
}
</script>

<style lang="less" scoped>

.noticeButton {
  display: inline-block;
  cursor: pointer;
  transition: all 0.3s;
}

.icon {
  padding: 4px;
  vertical-align: middle;
}

.badge {
  font-size: 16px;
}

</style>

<style lang="less">
@import '~@/styles/variables.less';

.notice-popover {
  position: relative;
  width: 336px;
}

.notice-tabs {

  .icon {
    padding: 4px;
    vertical-align: middle;
  }

  .ant-tabs-nav-scroll {
    text-align: center;
  }

  .ant-dropdown-menu-nav-scroll {
    text-align:center;
  }

  .ant-tabs-bar {
    margin-bottom: 0;
  }
}

.notice-container > * {
  background-color: #fff;
  border-radius: 4px;
  box-shadow: @shadow-1-down;
}

@media screen and (max-width: @screen-xs) {
  .notice-container {
    width: 100% !important;
  }
  .notice-container > * {
    border-radius: 0 !important;
  }
}
</style>
