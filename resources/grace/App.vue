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
import { deviceEnquire } from '@/utils/device'

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
    setTimeout(() => {
      document.getElementById('grace-loader').style.display = 'none'
    }, 200)
    deviceEnquire((screenType) => {
      this.$store.dispatch('theme/SetScreen', screenType)
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
