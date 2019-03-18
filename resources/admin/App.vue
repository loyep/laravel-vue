<template>
  <!-- <a-locale-provider :locale="locale"> -->
  <div id="app">
    <!-- <loading /> -->
    <router-view v-if="isRouterAlive" />
  </div>
  <!-- </a-locale-provider> -->
</template>

<script lang="ts">
// import zhCN from 'ant-design-vue/lib/locale-provider/zh_CN'
import { LocaleProvider } from 'ant-design-vue'
// import Loading from '@/components/Loading'
// import { deviceEnquire } from '@/utils/device'
import { Component, Vue } from 'vue-property-decorator';

@Component({
  components: {
    'ALocaleProvider': LocaleProvider,
  },
})
export default class App extends Vue { 
  
  private isRouterAlive: boolean = true
  
  // private locale: string 

  // name: 'App',
  // components: {
    // LocaleProvider,
    // Loading
  // },
  // provide () {
    // return {
      // reload: this.reload
    // }
  // },
  // data () {
    // return {
      // locale: zhCN,
      // isRouterAlive: true
    // }
  // },
  mounted () {
    setTimeout(() => {
      (<any>document).getElementById('prism-loader').style.display = 'none'
    }, 200)
    // deviceEnquire((screenType) => {
      // this.$store.dispatch('theme/SetScreen', screenType)
    // })
  }


    // reload () {
    //   this.isRouterAlive = false
    //   this.$nextTick(() => {
    //     this.isRouterAlive = true
    //   })
    // }
}
</script>
