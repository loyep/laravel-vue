<template>
  <locale-provider :locale="locale">
    <div id="app">
      <loading />
      <router-view v-if="isRouterAlive" />
    </div>
  </locale-provider>
</template>

<script>
import zhCN from 'ant-design-vue/lib/locale-provider/zh_CN'
import { LocaleProvider } from 'ant-design-vue'
import Loading from '@/components/Loading'
import { deviceEnquire, SCREEN_TYPE } from '@/utils/device'

export default {
  name: 'App',
  components: {
    LocaleProvider,
    Loading
  },
  provide () {
    return {
      reload: this.reload
    }
  },
  data () {
    return {
      locale: zhCN,
      isRouterAlive: true
    }
  },
  mounted () {
    deviceEnquire((screenType) => {
      let device
      let sidebar = true
      switch (screenType) {
        case SCREEN_TYPE.SCREEN_XS:
          device = 'mobile'
          sidebar = true
          break
        case SCREEN_TYPE.SCREEN_SM:
        case SCREEN_TYPE.SCREEN_MD:
        case SCREEN_TYPE.SCREEN_LG:
          device = 'tablet'
          sidebar = false
          break
        case SCREEN_TYPE.SCREEN_XL:
        case SCREEN_TYPE.SCREEN_XXL:
        default:
          device = 'desktop'
          sidebar = false
          break
      }

      this.$store.commit('app/TOGGLE_DEVICE', device)
      this.$store.dispatch('app/SetSidebar', sidebar)
      this.$store.commit('app/SET_SCREEN', screenType)
    })
  },
  methods: {
    reload () {
      this.isRouterAlive = false
      this.$nextTick(() => {
        this.isRouterAlive = true
      })
    }
  }
}
</script>
