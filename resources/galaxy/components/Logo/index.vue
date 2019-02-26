<template>
  <div :class="[ showTitle ? 'logo' : 'logo-title']">
    <router-link :to="{name:'dashboard'}">
      <img src="~@/assets/images/logo.svg" alt="logo">
      <h1 v-if="showTitle">
        {{ title }}
      </h1>
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'Logo',
  props: {
    title: {
      type: String,
      default: 'Ant Design Pro',
      required: false
    },
    showTitle: {
      type: Boolean,
      default: true,
      required: false
    }
  }
}
</script>

<style lang="less" scoped>
@import '~ant-design-vue/lib/style/themes/default.less';

@nav-header-height: @layout-header-height;

.logo {
  position: relative;
  height: @nav-header-height;
  padding-left: (@menu-collapsed-width - 32px) / 2;
  overflow: hidden;
  line-height: @nav-header-height;
  background: #002140;
  transition: all 0.3s;
  img {
    display: inline-block;
    height: 32px;
    vertical-align: middle;
  }
  h1 {
    display: inline-block;
    margin: 0 0 0 12px;
    color: white;
    font-weight: 600;
    font-size: 20px;
    font-family: Avenir, 'Helvetica Neue', Arial, Helvetica, sans-serif;
    vertical-align: middle;
  }
}

.logo-title {
  display: inline-block;
  height: @nav-header-height;
  padding: 0 0 0 24px;
  font-size: 20px;
  line-height: @nav-header-height;
  vertical-align: top;
  cursor: pointer;
  img {
    display: inline-block;
    height: 32px;
    vertical-align: middle;
  }
}
</style>
