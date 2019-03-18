<template>
  <a-dropdown placement="bottomRight">
    <span class="dropDown">
      <a-icon type="global" />
    </span>
    <template v-slot:overlay>
      <a-menu class="menu" :selectedKeys="[locale]" @click="changeLang">
        <a-menu-item v-for="item in locales" :key="item">
          <span role="img" :title="languageLabels[item]" :aria-label="languageLabels[item ]">
            {{ languageIcons[item] }}
          </span>
          {{ languageLabels[item] }}
        </a-menu-item>
      </a-menu>
    </template>
  </a-dropdown>
</template>

<script>
import { Dropdown, Menu } from 'ant-design-vue'
const languageLabels = {
  'zh_CN': '简体中文',
  'en_US': 'English'
}

const languageIcons = {
  'zh_CN': '🇨🇳',
  'en_US': '🇬🇧'
}

const locales = ['zh_CN', 'en_US']

export default {
  name: 'SelectLang',
  components: {
    'ADropdown': Dropdown,
    'AMenu': Menu,
    'AMenuItem': Menu.Item
  },
  inject: ['reload'],
  data () {
    return {
      locales,
      languageIcons,
      languageLabels
    }
  },
  computed: {
    locale () {
      return this.$i18n.locale
    }
  },
  methods: {
    changeLang ({ key }) {
      const locale = key
      this.$store.dispatch('app/SetLocale', locale)
      this.$i18n.locale = locale
      this.$message.success(this.$t('navBar.lang.switch'))
      this.reload()
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.menu {
  :global(.anticon) {
    margin-right: 8px;
  }
  :global(.ant-dropdown-menu-item) {
    min-width: 160px;
  }
}

.dropDown {
  line-height: @layout-header-height;
  vertical-align: top;
  cursor: pointer;
  > i {
    font-size: 16px !important;
    transform: none !important;
    svg {
      position: relative;
      top: -1px;
    }
  }
}

</style>
