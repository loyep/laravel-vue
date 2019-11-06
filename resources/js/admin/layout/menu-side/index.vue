<template>
  <div>
    <div class="el-layout-sider-logo" :class="{ 'el-layout-sider-logo-dark': siderTheme === 'dark' }">
      <a v-show="!hideLogo" to="/">
        <img v-if="menuCollapse" src="@assets/images/logo-small.png">
        <img v-else-if="siderTheme === 'light'" src="@assets/images/logo.png">
        <img v-else src="@assets/images/logo-dark.png">
      </a>
    </div>
    <!-- <Menu
                ref="menu"
                class="i-layout-menu-side i-scrollbar-hide"
                :theme="siderTheme"
                :accordion="menuAccordion"
                :active-name="activePath"
                :open-names="openNames"
                width="auto"> -->
    <el-menu
      ref="menu"
      defaultActive="1-3"
      :collapseTransition="false"
      class="el-layout-menu-side"
      :class="menuClasses"
      :collapse="menuCollapse"
    >
      <el-submenu index="1" popperClass="el-layout-menu-side">
        <template slot="title">
          <i class="el-icon-location" />
          <span class="title">导航一</span>
        </template>
        <el-menu-item index="1-1">
          选项1
        </el-menu-item>
        <el-menu-item index="1-2">
          选项2
        </el-menu-item>
        <el-menu-item index="1-3">
          选项3
        </el-menu-item>
        <el-submenu index="1-4">
          <span slot="title">选项4</span>
          <el-menu-item index="1-4-1">
            选项1
          </el-menu-item>
        </el-submenu>
      </el-submenu>
      <el-menu-item index="2">
        <i class="el-icon-menu" />
        <span slot="title">导航二</span>
      </el-menu-item>
      <el-menu-item index="3" disabled>
        <i class="el-icon-document" />
        <span slot="title">导航三</span>
      </el-menu-item>
      <el-menu-item index="4">
        <i class="el-icon-setting" />
        <span slot="title">导航四</span>
      </el-menu-item>
    </el-menu>
  </div>
</template>

<script>
    import {
        mapState
        // mapGetters
    } from 'vuex'
    export default {
        name: 'MenuSide',
        props: {
            hideLogo: {
                type: Boolean,
                default: false
            }
        },
        computed: {
            ...mapState('layout', [
                'siderTheme',
                'menuAccordion',
                'menuCollapse'
            ]),
            menuClasses () {
                return {
                    'el-layout-menu-side-dark': this.siderTheme === 'dark'
                }
            }
            // ...mapState('menu', [
            //   'activePath',
            //   'openNames'
            // ]),
            // ...mapGetters('menu', [
            //   'filterSider'
            // ])
        }
    }
</script>
