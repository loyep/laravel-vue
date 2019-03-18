<template>
  <div ref="settingDrawer">
    <a-drawer
      :visible="collapse"
      width="300"
      placement="right"
      :zIndex="999"
      :getContainer="() => $refs.settingDrawer"
      @close="togglerContent"
    >
      <div class="content">
        <div :style="{
          marginBottom: 24,
        }"
        >
          <h3 class="title">
            整体风格设置
          </h3>
          <block-checkbox
            :list="[
              {
                key: 'dark',
                url: require('@/assets/setting/darkTheme.svg'),
                title: '暗色菜单风格',
              },
              {
                key: 'light',
                url: require('@/assets/setting/lightTheme.svg'),
                title: '亮色菜单风格',
              },
            ]"
            :value="navTheme"
            @change="value => changeSetting('navTheme', value)"
          />
        </div>

        <theme-color
          title="主题色"
          :value="primaryColor"
          @change="color => changeSetting('primaryColor', color)"
        />

        <a-divider />

        <div style="margin-bottom: 24px;">
          <h3 class="title">
            导航模式
          </h3>
          <block-checkbox
            :list="[
              {
                key: 'sidemenu',
                url: require('@/assets/setting/sidemenu.svg'),
                title: '侧边菜单布局',
              },
              {
                key: 'topmenu',
                url: require('@/assets/setting/topmenu.svg'),
                title: '顶部菜单布局',
              },
            ]"
            :value="layoutMode"
            @change="value => changeSetting('layoutMode', value)"
          />
        </div>

        <a-list :split="false">
          <a-list-item>
            <span :style="{ opacity: '' }">内容区域宽度</span>
            <template v-slot:actions>
              <a-select
                :value="contentWidth"
                :defaultValue="contentWidth"
                size="small"
                style="width: 80px;"
                @select="value => changeSetting('contentWidth', value)"
              >
                <a-select-option key="Fluid" value="Fluid">
                  流式
                </a-select-option>
                <a-select-option v-if="layoutMode === 'topmenu'" key="Fixed" value="Fixed">
                  定宽
                </a-select-option>
              </a-select>
            </template>
          </a-list-item>
          <a-list-item>
            <span :style="{ opacity: '' }">固定 Header</span>
            <template v-slot:actions>
              <a-switch
                size="small"
                :checked="fixedHeader"
                @change="checked => changeSetting('fixedHeader', checked)"
              />
            </template>
          </a-list-item>
          <a-tooltip title="固定 Header 时可配置" placement="left">
            <a-list-item>
              <span :style="{ opacity: (!fixedHeader ? '0.5' : '') }">下滑时隐藏 Header</span>
              <template v-slot:actions>
                <a-switch
                  size="small"
                  :disabled="!fixedHeader"
                  :checked="autoHideHeader"
                  @change="checked => changeSetting('autoHideHeader', checked)"
                />
              </template>
            </a-list-item>
          </a-tooltip>

          <a-tooltip title="侧边菜单布局时可配置" placement="left">
            <a-list-item>
              <span :style="{ opacity: (layoutMode === 'topmenu' ? '0.5' : '') }">固定侧边菜单</span>
              <template v-slot:actions>
                <a-switch
                  size="small"
                  :disabled="layoutMode === 'topmenu'"
                  :checked="fixSidebar"
                  @change="checked => changeSetting('fixSidebar', checked)"
                />
              </template>
            </a-list-item>
          </a-tooltip>
        </a-list>

        <a-divider />

        <div style="margin-bottom: 24px;">
          <h3 class="title">
            其他设置
          </h3>
          <a-list-item>
            <span :style="{ opacity: '' }">色弱模式</span>
            <template v-slot:actions>
              <a-switch
                size="small"
                :checked="colorWeak"
                @change="checked => changeSetting('colorWeak', checked)"
              />
            </template>
          </a-list-item>
        </div>

        <a-divider />

        <a-button block icon="copy">
          拷贝设置
        </a-button>
      </div>
      <a-alert type="warning" class="productionHint">
        <template v-slot:message>
          <div>
            配置栏只在开发环境用于预览，生产环境不会展现，请拷贝后手动修改配置文件
            <a
              href="https://u.ant.design/pro-v2-default-settings"
              target="_blank"
              rel="noopener noreferrer"
            >src/defaultSettings.js</a>
          </div>
        </template>
      </a-alert>
      <div class="handle" @click="togglerContent">
        <a-icon :type="collapse ? 'close' : 'setting'" style="color: #fff; font-size: 20px;" />
      </div>
    </a-drawer>
  </div>
</template>

<script>
import { Drawer, Divider, List, Alert } from 'ant-design-vue'
import BlockCheckbox from './BlockCheckbox'
import ThemeColor from './ThemeColor'
import { themeMixin } from '@/mixins'
export default {
  name: 'SettingDrawer',
  components: {
    ADrawer: Drawer,
    ADivider: Divider,
    AList: List,
    AListItem: List.Item,
    AAlert: Alert,
    BlockCheckbox,
    ThemeColor
  },
  mixins: [themeMixin],
  data () {
    return {
      collapse: false
    }
  },
  mounted () {
    this.collapse = true
    setTimeout(() => {
      this.collapse = false
    }, 20)
  },
  methods: {
    togglerContent () {
      this.collapse = !this.collapse
    },
    changeSetting (setting, value) {
      const config = {
        layoutMode: 'ToggleLayoutMode',
        fixedHeader: 'ToggleFixedHeader',
        navTheme: 'ToggleTheme',
        primaryColor: 'ToggleColor',
        contentWidth: 'ToggleContentWidth',
        autoHideHeader: 'ToggleFixedHeaderHidden',
        fixSidebar: 'ToggleFixSidebar',
        colorWeak: 'ToggleWeak'
      }
      if (config[setting]) {
        this.$store.dispatch(`theme/${config[setting]}`, value)
      }
    }
  }
}
</script>

<style lang="less" scoped>
@import "~@/styles/variables.less";

.content {
  position: relative;
  min-height: 100%;
  background: #fff;
}

.color_block {
  display: inline-block;
  width: 38px;
  height: 22px;
  margin: 4px;
  margin-right: 12px;
  vertical-align: middle;
  border-radius: 4px;
  cursor: pointer;
}

.title {
  margin-bottom: 12px;
  color: @heading-color;
  font-size: 14px;
  line-height: 22px;
}

.handle {
  position: absolute;
  top: 240px;
  right: 300px;
  z-index: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 48px;
  height: 48px;
  font-size: 16px;
  text-align: center;
  background: @primary-color;
  border-radius: 4px 0 0 4px;
  cursor: pointer;
  pointer-events: auto;
}

.productionHint {
  margin-top: 16px;
  font-size: 12px;
}
</style>
