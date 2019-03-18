<template>
  <span class="headerSearch" @click="enterSearchMode">
    <a-icon type="search" />
    <a-auto-complete
      key="AutoComplete"
      ref="input"
      :class="['input ', {'show': searchMode}]"
      :dataSource="dataSource"
      :value="value"
      @change="onSearchChange"
      @search="onSearch"
    >
      <a-input
        ref="searchInput"
        :placeholder="placeholder"
        :value="value"
        :aria-label="placeholder"
        @keydown="(e) => onKeyDown(e)"
        @blur="leaveSearchMode"
      />
    </a-auto-complete>
  </span>
</template>

<script>
import { AutoComplete } from 'ant-design-vue'
export default {
  name: 'HeaderSearch',
  components: {
    'AAutoComplete': AutoComplete
  },
  props: {
    placeholder: {
      type: String,
      default: function () {
        return '站内搜索'
      }
    }
    // onSearch: {
    //   type: Function,
    //   required: false,
    //   default: function () {
    //     return () => { console.log(this.value) }
    //   }
    // }
  },
  data () {
    return {
      searchMode: false,
      dataSource: [],
      value: ''
    }
  },
  methods: {
    onSearch () {
      this.$emit('search', this.value)
    },
    onKeyDown (e) {

    },
    onSearchChange (value) {
      this.value = value
      if (this.onChange) {
        this.onChange()
      }
    },
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
      setTimeout(() => {
        this.$refs.input.focus()
      }, 300)
    },
    leaveSearchMode () {
      this.value = ''
      this.searchMode = false
    }
  }
}
</script>

<style lang="less" scope>
@import '~@/styles/variables.less';

.headerSearch {
  :global(.anticon-search) {
    font-size: 16px;
    cursor: pointer;
  }
  .input {
    width: 0;
    background: transparent;
    border-radius: 0;
    transition: width 0.3s, margin-left 0.3s;
    :global(.ant-select-selection) {
      background: transparent;
    }
    input {
      padding-right: 0;
      padding-left: 0;
      border: 0;
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
