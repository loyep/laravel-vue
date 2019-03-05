<template>
  <a-dropdown
    placement="bottomRight"
    overlayClassName="notice-container notice-popover"
    :trigger="['click']"
    @visibleChange="handleVisibleChange"
  >
    <span>
      <a-badge :count="count" :style="{ boxShadow: 'none' }" class="badge">
        <a-icon type="bell" class="icon" />
      </a-badge>
    </span>
    <template slot="overlay">
      <a-spin :spinning="false" :delay="0">
        <a-tabs class="notice-tabs" defaultActiveKey="1">
          <a-tab-pane key="1" tab="通知(0)">
            Content of Tab Pane 1
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
          </a-tab-pane>
          <a-tab-pane key="2" tab="消息(0)">
            Content of Tab Pane 2
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
          </a-tab-pane>
          <a-tab-pane key="3" tab="待办(0)">
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
            Content of Tab Pane 3
          </a-tab-pane>
        </a-tabs>
      </a-spin>
    </template>
  </a-dropdown>
</template>

<script>
import { Badge, Icon, Dropdown, List, Tabs, Avatar, Spin } from 'ant-design-vue'
export default {
  name: 'NoticeIcon',
  components: {
    'AAvatar': Avatar,
    'ABadge': Badge,
    'AIcon': Icon,
    'ATabs': Tabs,
    'ATabPane': Tabs.TabPane,
    'AList': List,
    'AListItem': List.Item,
    'AListItemMeta': List.Item.Meta,
    'ASpin': Spin,
    'ADropdown': Dropdown
  },
  data () {
    return {
      visible: true,
      loading: false,
      count: 1
    }
  },
  methods: {
    handleVisibleChange (visible) {
      this.visible = visible
    },
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
