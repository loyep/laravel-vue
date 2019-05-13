<template>
    <a-locale-provider :locale="locale">
        <div id="app">
            <router-view v-if="isRouterAlive"/>
        </div>
    </a-locale-provider>
</template>

<script>
  import zhCN from 'ant-design-vue/lib/locale-provider/zh_CN'
  import {LocaleProvider} from 'ant-design-vue'
  import {deviceEnquire} from '@/utils/device'

  export default {
    name: 'App',
    components: {
      ALocaleProvider: LocaleProvider,
    },
    data() {
      return {
        isRouterAlive: true,
        locale: zhCN,
      }
    },
    mounted() {
      deviceEnquire(screenType => {
        this.$store.dispatch('theme/SetScreen', screenType)
      })
    },
    methods: {
      reload() {
        this.isRouterAlive = false
        this.$nextTick(() => {
          this.isRouterAlive = true
        })
      },
    },
  }
</script>
