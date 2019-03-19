<template>
  <a-dropdown placement="bottomRight">
    <span class="dropDown">
      <a-icon type="global"/>
    </span>
    <template v-slot:overlay>
      <a-menu class="menu" :selectedKeys="[locale]" @click="changeLang">
        <a-menu-item v-for="item in locales" :key="item">
          <span
            role="img"
            :title="languageLabels[item]"
            :aria-label="languageLabels[item ]"
          >{{ languageIcons[item] }}</span>
          {{ languageLabels[item] }}
        </a-menu-item>
      </a-menu>
    </template>
  </a-dropdown>
</template>

<script lang="ts">
import { Component, Vue, Prop } from "vue-property-decorator";
import { Dropdown, Menu } from "ant-design-vue";
const languageLabels = {
  zh_CN: "简体中文"
};

const languageIcons = {
  zh_CN: "🇨🇳"
};

const locales = ["zh_CN"];

@Component({
  components: {
    ADropdown: Dropdown,
    AMenu: Menu,
    AMenuItem: Menu.Item
  }
})
export default class SelectLang extends Vue {
  private locales = locales;
  private languageIcons = languageIcons;
  private languageLabels = languageLabels;

  get locale() {
    return this.$i18n.locale;
  }

  changeLang({ key }) {
    const locale = key;
    this.$store.dispatch("app/SetLocale", locale);
    this.$i18n.locale = locale;
    // this.$message.success(this.$t("navBar.lang.switch"));
    // this.reload();
  }
}
</script>

<style lang="less" scoped>
@import "~@/styles/variables.less";

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
