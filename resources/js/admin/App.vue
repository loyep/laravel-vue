<template>
  <div id="app">
    <el-container class="el-layout">
      <el-aside v-if="!isMobile && !hideSider" class="el-layout-sider" :class="siderClasses" :width="menuSideWidth">
        <menu-side :hideLogo="isHeaderStick && headerFix && showHeader" />
      </el-aside>
      <el-container class="el-layout-inside" :class="insideClasses">
        <transition name="fade-quick">
          <el-header class="el-layout-header" :class="headerClasses" :style="headerStyle" :height="headerHeight">
            <header-logo v-if="isMobile && showMobileLogo" />
            <header-logo v-if="!isMobile && isHeaderStick && headerFix" />
            <header-collapse v-if="(isMobile || showSiderCollapse) && !hideSider" @toggleDrawer="handleToggleDrawer" />
            <header-reload v-if="!isMobile && showReload" @reload="handleReload" />
            <header-search v-if="showSearch && !headerMenu && !isMobile && !showBreadcrumb" />
            <div class="el-layout-header-right">
              <header-search v-if="(showSearch && isMobile) || (showSearch && (headerMenu || showBreadcrumb))" />
              <!-- <menu-head v-if="headerMenu && isMobile" /> -->
              <!-- <header-log v-if="isDesktop && showLog" />-->
              <header-fullscreen v-if="isDesktop && showFullscreen" />
              <!-- <header-notice v-if="showNotice" />-->
              <header-user />
              <header-setting v-if="!isMobile" />
            <!-- <header-i18n v-if="showI18n" />
            <header-setting v-if="enableSetting && !isMobile" /> -->
            </div>
          </el-header>
        </transition>
      <!-- <div :class="classObj" class="app-wrapper">
        <div v-if="device==='mobile'&&sidebar.opened" class="drawer-bg" @click="handleClickOutside" />
        <div :class="{hasTagsView:needTagsView}" class="main-container">
          <div :class="{'fixed-header':fixedHeader}">
            <navbar />
            <tags-view v-if="needTagsView" />
          </div>
          <app-main />
          <right-panel v-if="showSettings">
            <settings />
          </right-panel>
        </div>
      </div> -->
      </el-container>

      <div v-if="isMobile && !hideSider">
        <el-drawer :visible.sync="showDrawer" direction="ltr" :size="menuSideWidth" :showClose="false" :customClass="drawerClasses">
          <menu-side />
        </el-drawer>
      </div>
    </el-container>
  </div>
</template>

<script>
    import Setting from '@/setting';
    import { mapState, mapMutations } from 'vuex'
    import { on, off } from '@/utils/dom';
    import HeaderLogo from './layout/header-logo';
    import HeaderCollapse from './layout/header-collapse';
    import HeaderReload from './layout/header-reload'
    import HeaderSearch from './layout/header-search'
    import HeaderUser from './layout/header-user'
    import HeaderFullscreen from './layout/header-fullscreen'
    import HeaderSetting from './layout/header-setting'

    import { setMatchMedia } from '@/utils/assist'
    import MenuSide from './layout/menu-side'

    setMatchMedia()
    export default {
        name: 'App',
        components: {
            MenuSide,
            HeaderLogo,
            HeaderReload,
            HeaderCollapse,
            HeaderSearch,
            HeaderUser,
            HeaderFullscreen,
            HeaderSetting
        },
        data () {
            return {
                hideSider: false,
                showDrawer: false,
                ticking: false,
                headerVisible: true,
                oldScrollTop: 0,
                isDelayHideSider: false, // hack，当从隐藏侧边栏的 header 切换到正常 header 时，防止 Logo 抖动
                loadRouter: true
            }
        },
        computed: {
            ...mapState({
                sidebar: state => state.app.sidebar,
                device: state => state.app.device,
                showSettings: state => state.settings.showSettings,
                needTagsView: state => state.settings.tagsView,
                fixedHeader: state => state.settings.fixedHeader
            }),
            // 如果开启 headerMenu，且当前 header 的 hideSider 为 true，则将顶部按 headerStick 处理
            // 这时，即使没有开启 headerStick，仍然按开启处理
            isHeaderStick () {
                let state = this.headerStick
                if (this.hideSider) state = true
                return state
            },
            headerHeight () {
                return `${Setting.headerHeight}px`
            },
            ...mapState('layout', [
                'siderTheme',
                'headerTheme',
                'headerStick',
                'tabs',
                'tabsFix',
                'siderFix',
                'headerFix',
                'headerHide',
                'headerMenu',
                'isMobile',
                'isTablet',
                'isDesktop',
                'menuCollapse',
                'showMobileLogo',
                'showSearch',
                'showNotice',
                'showFullscreen',
                'showSiderCollapse',
                'showBreadcrumb',
                'showLog',
                'showI18n',
                'showReload',
                'enableSetting'
            ]),

            showHeader () {
                let visible = true
                if (this.headerFix && this.headerHide && !this.headerVisible) visible = false
                return visible
            },
            headerClasses () {
                return [
                    `el-layout-header-color-${this.headerTheme}`,
                    {
                        'el-layout-header-fix': this.headerFix,
                        'el-layout-header-fix-collapse': this.headerFix && this.menuCollapse,
                        'el-layout-header-mobile': this.isMobile,
                        'el-layout-header-stick': this.isHeaderStick && !this.isMobile,
                        'el-layout-header-with-menu': this.headerMenu,
                        'el-layout-header-with-hide-sider': this.hideSider || this.isDelayHideSider
                    }
                ]
            },
            headerStyle () {
                const menuWidth = this.isHeaderStick ? 0 : this.menuCollapse ? 80 : Setting.menuSideWidth
                return this.isMobile || !this.headerFix ? {} : {
                    width: `calc(100% - ${menuWidth}px)`
                }
            },
            siderClasses () {
                return {
                    'el-layout-sider-fix': this.siderFix,
                    'el-layout-sider-dark': this.siderTheme === 'dark'
                }
            },
            classObj () {
                return {
                    hideSidebar: !this.sidebar.opened,
                    openSidebar: this.sidebar.opened,
                    withoutAnimation: this.sidebar.withoutAnimation,
                    mobile: this.device === 'mobile'
                }
            },
            insideClasses () {
                return {
                    'el-layout-inside-fix-with-sider': this.siderFix,
                    'el-layout-inside-fix-with-sider-collapse': this.siderFix && this.menuCollapse,
                    'el-layout-inside-with-hide-sider': this.hideSider,
                    'el-layout-inside-mobile': this.isMobile
                }
            },
            menuSideWidth () {
                return `${this.menuCollapse ? 80 : Setting.menuSideWidth}px`
            }
        },
        mounted () {
            on(window, 'resize', this.handleWindowResize)
            this.handleMatchMedia()
        },
        beforeDestroy () {
            off(window, 'resize', this.handleWindowResize)
        },
        methods: {
            ...mapMutations('layout', [
                'setDevice'
            ]),
            handleWindowResize () {
                this.handleMatchMedia()
            },
            handleMatchMedia () {
                const matchMedia = window.matchMedia

                if (matchMedia('(max-width: 600px)').matches) {
                    this.setDevice('Mobile')
                } else if (matchMedia('(max-width: 992px)').matches) {
                    this.setDevice('Tablet')
                } else {
                    this.setDevice('Desktop')
                }
            },
            handleClickOutside () {
                this.$store.dispatch('app/closeSideBar', { withoutAnimation: false })
            },
            handleToggleDrawer (state) {
                if (typeof state === 'boolean') {
                    this.showDrawer = state
                } else {
                    this.showDrawer = !this.showDrawer
                }
            },
            handleReload () {
                this.loadRouter = false
                this.$nextTick(() => {
                    this.loadRouter = true
                })
            }
        }
    }
</script>
