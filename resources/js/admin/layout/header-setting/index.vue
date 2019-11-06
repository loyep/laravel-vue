<template>
  <span class="el-layout-header-trigger el-layout-header-trigger-min" @click="showSetting">
    <i class="el-icon-s-operation" />

    <el-drawer :visible.sync="visible" size="280px" customClass="el-layout-header-setting" title="主题设置">
      <el-divider size="small">风格设置</el-divider>

      <div class="el-layout-header-setting-item">
        <div class="el-layout-header-setting-item-radio" :class="{ 'on': siderTheme === 'dark' }" @click="handleChangeSetting('siderTheme', 'dark')">
          <el-tooltip content="暗色侧边栏" placement="top">
            <img src="@assets/svg/nav-theme-dark.svg">
          </el-tooltip>
        </div>
        <div class="el-layout-header-setting-item-radio" :class="{ 'on': siderTheme === 'light' }" @click="handleChangeSetting('siderTheme', 'light')">
          <el-tooltip content="亮色侧边栏" placement="top">
            <img src="@assets/svg/nav-theme-light.svg">
          </el-tooltip>
        </div>
      </div>
      <div class="el-layout-header-setting-item">
        <div class="el-layout-header-setting-item-radio" :class="{ 'on': headerTheme === 'light' }" @click="handleChangeSetting('headerTheme', 'light')">
          <el-tooltip content="亮色顶栏" placement="top">
            <img src="@assets/svg/nav-theme-dark.svg">
          </el-tooltip>
        </div>
        <div class="el-layout-header-setting-item-radio" :class="{ 'on': headerTheme === 'dark' }" @click="handleChangeSetting('headerTheme', 'dark')">
          <el-tooltip content="暗色顶栏" placement="top">
            <img src="@assets/svg/header-theme-dark.svg">
          </el-tooltip>
        </div>
        <div class="el-layout-header-setting-item-radio" :class="{ 'on': headerTheme === 'primary' }" @click="handleChangeSetting('headerTheme', 'primary')">
          <el-tooltip content="主色顶栏" placement="top">
            <img src="@assets/svg/header-theme-primary.svg">
          </el-tooltip>
        </div>
      </div>

      <el-divider size="small">导航设置</el-divider>

      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">固定侧边栏</span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="siderFix" @change="(val) => handleChangeSetting('siderFix', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">固定顶栏</span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="headerFix" @change="(val) => handleChangeSetting('headerFix', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item" :class="{ 'el-layout-header-setting-item-disabled': !headerFix }">
        <span class="el-layout-header-setting-item-desc">
          下滑时隐藏顶栏
          <el-tooltip placement="top" content="需开启固定顶栏">
            <i class="el-icon-question" />
          </el-tooltip>
        </span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="headerHide" :disabled="!headerFix" @change="(val) => handleChangeSetting('headerHide', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item" :class="{ 'el-layout-header-setting-item-disabled': !headerFix }">
        <span class="el-layout-header-setting-item-desc">
          置顶顶栏
          <el-tooltip placement="top" content="需开启固定顶栏">
            <i class="el-icon-question" />
          </el-tooltip>
        </span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="headerStick" :disabled="!headerFix" @change="(val) => handleChangeSetting('headerStick', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">侧边栏开启手风琴模式</span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="menuAccordion" @change="(val) => handleChangeSetting('menuAccordion', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">显示折叠侧边栏按钮</span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="showSiderCollapse" @change="(val) => handleChangeSetting('showSiderCollapse', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">侧边栏折叠时显示父级菜单名</span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="showCollapseMenuTitle" @change="(val) => handleChangeSetting('showCollapseMenuTitle', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">
          显示全局面包屑导航
          <el-tooltip placement="top" content="headerMenu 开启时无效">
            <i class="el-icon-question" />
          </el-tooltip>
        </span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="showBreadcrumb" @change="(val) => handleChangeSetting('showBreadcrumb', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item" :class="{ 'el-layout-header-setting-item-disabled': !showBreadcrumb }">
        <span class="el-layout-header-setting-item-desc">
          全局面包屑显示图标
          <el-tooltip placement="top" content="需开启全局面包屑导航">
            <i class="el-icon-question" />
          </el-tooltip>
        </span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="showBreadcrumbIcon" :disabled="!showBreadcrumb" @change="(val) => handleChangeSetting('showBreadcrumbIcon', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">显示重载页面按钮</span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="showReload" @change="(val) => handleChangeSetting('showReload', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">显示多语言选择</span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="showI18n" @change="(val) => handleChangeSetting('showI18n', val)" />
        </span>
      </div>

      <el-divider size="small">其它设置</el-divider>

      <div class="el-layout-header-setting-item">
        <span class="el-layout-header-setting-item-desc">开启多页签</span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="tabs" @change="(val) => handleChangeSetting('tabs', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item" :class="{ 'el-layout-header-setting-item-disabled': !tabs }">
        <span class="el-layout-header-setting-item-desc">
          多页签显示图标
          <el-tooltip placement="top" content="需开启多页签">
            <i class="el-icon-question" />
          </el-tooltip>
        </span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="showTabsIcon" :disabled="!tabs" @change="(val) => handleChangeSetting('showTabsIcon', val)" />
        </span>
      </div>
      <div class="el-layout-header-setting-item" :class="{ 'el-layout-header-setting-item-disabled': !tabs }">
        <span class="el-layout-header-setting-item-desc">
          固定多页签
          <el-tooltip placement="top" content="需开启多页签">
            <i class="el-icon-question" />
          </el-tooltip>
        </span>
        <span class="el-layout-header-setting-item-action">
          <el-switch size="small" :value="tabsFix" :disabled="!tabs" @change="(val) => handleChangeSetting('tabsFix', val)" />
        </span>
      </div>
      <el-alert type="warning" :closable="false" title="该功能主要实时预览各种布局效果，更多完整配置在 'setting.js' 中设置。建议在生产环境关闭该布局预览功能。" />
    </el-drawer>
  </span>
</template>
<script>
    import { mapState, mapMutations } from 'vuex'

    export default {
        name: 'HeaderSetting',
        data () {
            return {
                visible: false
            }
        },
        computed: {
            ...mapState('layout', [
                'siderTheme',
                'headerTheme',
                'headerStick',
                'siderFix',
                'headerFix',
                'headerHide',
                'menuAccordion',
                'showSiderCollapse',
                'tabs',
                'showTabsIcon',
                'tabsFix',
                'showBreadcrumb',
                'showBreadcrumbIcon',
                'showReload',
                'showI18n',
                'showCollapseMenuTitle'
            ])
        },
        methods: {
            ...mapMutations('layout', [
                'updateLayoutSetting'
            ]),
            showSetting () {
                this.visible = true
            },
            handleChangeSetting (key, value) {
                this.updateLayoutSetting({
                    key,
                    value
                })
            }
        }
    }
</script>
