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
import { deviceEnquire, DEVICE_TYPE } from '@/utils/device'

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
    deviceEnquire(deviceType => {
      let device = 'mobile'
      let sidebar = true
      switch (deviceType) {
        case DEVICE_TYPE.DESKTOP:
          device = 'desktop'
          sidebar = true
          break
        case DEVICE_TYPE.TABLET:

          device = 'tablet'
          sidebar = false
          break
        case DEVICE_TYPE.MOBILE:
        default:
          break
      }

      this.$store.commit('app/TOGGLE_DEVICE', device)
      this.$store.dispatch('app/SetSidebar', sidebar)
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

<style lang="less">
@import "./styles/global.less";
</style>
