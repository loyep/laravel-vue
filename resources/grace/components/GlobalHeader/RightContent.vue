<template>
  <div class="right">
    <header-search class="action" />
    <Tooltip title="Help">
      <a target="_blank" href="https://pro.ant.design/docs/getting-started" rel="noopener noreferrer" class="action">
        <a-icon type="question-circle-o" />
      </a>
    </Tooltip>
    <header-dropdown class="action" />
    <select-lang class="action" />
  </div>
</template>

<script type="text/ecmascript-6">
import { Tooltip } from 'ant-design-vue'
import SelectLang from '@/components/SelectLang'
import HeaderDropdown from '@/components/HeaderDropdown'
import HeaderSearch from '@/components/HeaderSearch'
export default {
  name: 'RightContent',
  components: {
    SelectLang,
    Tooltip,
    HeaderDropdown,
    HeaderSearch
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

@pro-header-hover-bg: rgba(0, 0, 0, 0.025);

.right {
    float: right;
    height: 100%;
    overflow: hidden;
    .action {
        cursor: pointer;
        padding: 0 12px;
        display: inline-block;
        transition: all 0.3s;
        height: 100%;
        > i {
            vertical-align: middle;
            color: @text-color;
        }
        &:hover {
            background: @pro-header-hover-bg;
        }
        &:global(.opened) {
            background: @pro-header-hover-bg;
        }
    }
    .search {
        padding: 0 12px;
        &:hover {
            background: transparent;
        }
    }
    .account {
        .avatar {
            margin: ~'calc((@{layout-header-height} - 24px) / 2)' 0;
            margin-right: 8px;
            color: @primary-color;
            background: rgba(255, 255, 255, 0.85);
            vertical-align: top;
        }
    }
}
</style>
