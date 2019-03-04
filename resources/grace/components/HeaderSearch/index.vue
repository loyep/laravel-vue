<template>
  <span class="headerSearch">
    <a-icon type="search" @click="enterSearchMode" />
    <a-auto-complete
      ref="input"
      :dataSource="dataSource"
      class="show"
      placeholder="站内搜索"
      @blur="leaveSearchMode"
    />
  </span>
</template>

<script>
import { AutoComplete } from 'ant-design-vue'
export default {
  name: 'HeaderSearch',
  components: {
    'a-auto-complete': AutoComplete
  },
  data () {
    return {
      searchMode: false,
      dataSource: []
    }
  },
  methods: {
    enterSearchMode () {
      this.searchMode = true
      // const input = this.$refs.input
      // setTimeout(() => input.focus(), 300)
      // this.setState({ searchMode: true }, () => {
      //   const { searchMode } = this.state
      //   if (searchMode) {
      //     this.input.focus()
      //   }
      // })
    },
    leaveSearchMode () {

    }
  }
}
</script>

<style lang="less" scope>
@import '~@/styles/variables.less';

.headerSearch {
  .input {
    transition: width 0.3s, margin-left 0.3s;
    width: 0;
    background: transparent;
    border-radius: 0;
    input {
      border: 0;
      padding-left: 0;
      padding-right: 0;
      box-shadow: none !important;
    }
    &,
    &:hover,
    &:focus {
      border-bottom: 1px solid @border-color-base;
    }
    &.show {
      width: 210px;
      margin-left: 8px;
    }
  }
}

</style>

<style lang="less">
@import '~@/styles/variables.less';

.headerSearch {
  .anticon-search {
    cursor: pointer;
    font-size: 16px;
  }
  .input {
    .ant-select-selection {
      background: transparent;
    }
  }
}

</style>
