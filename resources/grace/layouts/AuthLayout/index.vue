<template>
  <div class="container">
    <div class="lang">
      <select-lang />
    </div>
    <div class="content">
      <div class="top">
        <div class="header">
          <router-link :to="{ path: '/' }">
            <img alt="logo" class="logo" :src="logo">
            <span class="title">
              {{ name }}
            </span>
          </router-link>
        </div>
        <div class="desc">
          {{ description }}
        </div>
      </div>
      <!-- <router-view /> -->
      <slot />
    </div>
    <global-footer :links="[
      {
        key: 'github',
        icon: 'github',
        path: 'https://github.com/loyep/grace',
        blankTarget: true
      }
    ]"
    >
      <template slot="copyright">
        Copyright <a-icon type="copyright" /> {{ year }} Power By Grace
      </template>
    </global-footer>
  </div>
</template>

<script type="text/ecmascript-6">
import background from '@/assets/images/background.svg'
import GlobalFooter from '@/components/GlobalFooter'
import SelectLang from '@/components/SelectLang'
import logo from '@/assets/images/logo.png'

export default {
  name: 'AuthLayout',
  components: {
    SelectLang,
    GlobalFooter
  },
  data () {
    return {
      year: new Date().getFullYear(),
      backgroundImage: background,
      logo,
      name: window.config.name,
      description: window.config.description
    }
  }
}
</script>

<style lang="less" scoped>
    @import '~ant-design-vue/lib/style/themes/default.less';

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
            background-image: url('https://gw.alipayobjects.com/zos/rmsportal/TVYTbAXWheQpRcWDaDMu.svg');
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
        font-family: Avenir, 'Helvetica Neue', Arial, Helvetica, sans-serif;
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
