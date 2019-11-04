<template>
  <div>
    <div class="el-layout-sider-logo" :class="{ 'el-layout-sider-logo-dark': siderTheme === 'dark' }">
      <transition name="fade-quick">
        <i-link v-show="!hideLogo" to="/">
          <img v-if="menuCollapse" src="@/assets/images/logo-small.png">
          <img v-else-if="siderTheme === 'light'" src="@/assets/images/logo.png">
          <img v-else src="@/assets/images/logo-dark.png">
        </i-link>
      </transition>
    </div>
    <el-menu
      ref="menu"
      class="el-layout-menu-side i-scrollbar-hide"
      :theme="siderTheme"
      :accordion="menuAccordion"
      :activeName="activePath"
      :openNames="openNames"
      width="auto"
    >
      <template v-for="(item, index) in filterSider">
        <template v-if="!menuCollapse">
          <menu-side-item v-if="item.children === undefined || !item.children.length" :key="index" :menu="item" />
          <menu-side-submenu v-else :key="index" :menu="item" />
        </template>
        <template v-else>
          <el-tooltip v-if="item.children === undefined || !item.children.length" :key="index" :content="tTitle(item.title)" placement="right">
            <i-menu-side-item :menu="item" hideTitle />
          </el-tooltip>
          <i-menu-side-collapse v-else :key="index" :menu="item" topLevel />
        </template>
      </template>
    </el-menu>
  </div>
</template>

<script>
    export default {
        name: 'MenuSide'
    }
</script>
