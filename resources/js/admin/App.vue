<template>
  <div id="app">
    <el-container class="el-layout">
      <el-aside :width="menuSideWidth" class="el-layout-sider">
        Aside
      </el-aside>
      <el-container class="el-layout-inside" :class="insideClasses">
        <el-header v-show="showHeader" class="el-layout-header" :class="headerClasses" :style="headerStyle">
          Header
        </el-header>
        <el-main>
          <router-view />
        </el-main>
      </el-container>
    </el-container>
  </div>
</template>

<script>
    import Setting from '@/setting';
    import { on, off } from '@/utils/dom';
    import { mapMutations } from 'vuex';

    export default {
        name: 'App',
        data () {
            return {
                menuCollapse: false,
                hideSider: false,
                isMobile: false,
                siderFix: false,
                headerHide: false,
                headerVisible: true
            }
        },
        computed: {
            showHeader () {
                let visible = true;
                if (this.headerFix && this.headerHide && !this.headerVisible) visible = false;
                return visible;
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
                ];
            },
            headerStyle () {
                const menuWidth = this.isHeaderStick ? 0 : this.menuCollapse ? 80 : Setting.menuSideWidth;
                return this.isMobile || !this.headerFix ? {} : {
                    width: `calc(100% - ${menuWidth}px)`
                };
            },
            insideClasses () {
                return {
                    'el-layout-inside-fix-with-sider': this.siderFix,
                    'el-layout-inside-fix-with-sider-collapse': this.siderFix && this.menuCollapse,
                    'el-layout-inside-with-hide-sider': this.hideSider,
                    'el-layout-inside-mobile': this.isMobile
                };
            },
            menuSideWidth () {
                return (this.menuCollapse ? 80 : Setting.menuSideWidth) + 'px';
            }
        },
        mounted () {
            on(window, 'resize', this.handleWindowResize);
        },
        beforeDestroy () {

        }
    }
</script>
