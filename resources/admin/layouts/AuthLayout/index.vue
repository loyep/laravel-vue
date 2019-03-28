<template>
  <div
    class="container"
    :style="{
      backgroundImage: `'url(${require('@/assets/images/loginBg.svg')})'`
    }"
  >
    <div class="lang">
      <select-lang/>
    </div>
    <div class="content">
      <div class="top">
        <div class="header">
          <router-link :to="{ path: '/' }">
            <img alt="logo" class="logo" src="~@/assets/images/logo.png">
            <span class="title">{{ name }}</span>
          </router-link>
        </div>
        <div class="desc">{{ description }}</div>
      </div>
      <slot/>
    </div>
    <global-footer
      :links="[
        {
          key: 'github',
          icon: 'github',
          path: 'https://github.com/loyep/prism',
          blankTarget: true
        }
      ]"
    >
      <template #copyright>
        Copyright
        <a-icon type="copyright"/>
        {{ year }} Power By
        <a href="https://github.com/loyep/prism">Prism</a>
      </template>
    </global-footer>
  </div>
</template>

<script lang="ts">
import GlobalFooter from "@/components/GlobalFooter/index.vue";
import SelectLang from "@/components/SelectLang/index.vue";
import { Component, Vue } from "vue-property-decorator";

@Component({
  components: {
    GlobalFooter,
    SelectLang
  }
})
export default class AuthLayout extends Vue {
  private year: number = new Date().getFullYear();

  private name: any = (<any>window).config.name;

  private description: any = (<any>window).config.description;
}
</script>

<style lang="less" scoped>
@import "~@/styles/variables.less";

.container {
  display: flex;
  flex-direction: column;
  height: 100vh;
  overflow: auto;
  background: @layout-body-background;
}

.lang {
  text-align: right;
  width: 100%;
  height: 40px;
  line-height: 44px;
  :global(.ant-dropdown-trigger) {
    margin-right: 24px;
  }
}

.content {
  padding: 32px 0;
  flex: 1;
}

@media (min-width: @screen-md-min) {
  .container {
    /*background-image: url(require('@/assets/images/loginBg.svg'));*/
    background-repeat: no-repeat;
    background-position: center 110px;
    background-size: 100%;
  }

  .content {
    padding: 32px 0 24px 0;
  }
}

.top {
  text-align: center;
}

.header {
  height: 44px;
  line-height: 44px;
  a {
    text-decoration: none;
  }
}

.logo {
  height: 44px;
  vertical-align: top;
  margin-right: 16px;
}

.title {
  font-size: 33px;
  color: @heading-color;
  font-family: Avenir, "Helvetica Neue", Arial, Helvetica, sans-serif;
  font-weight: 600;
  position: relative;
  top: 2px;
}

.desc {
  font-size: @font-size-base;
  color: @text-color-secondary;
  margin-top: 12px;
  margin-bottom: 40px;
}
</style>
