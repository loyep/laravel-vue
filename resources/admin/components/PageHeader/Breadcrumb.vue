<template>
  <a-breadcrumb class="breadcrumb">
    <a-breadcrumb-item v-for="(item, key) in breadList" :key="key">
      <router-link v-if="item.name != name" :to="{ path: item.path }">
        {{ item.meta.title }}
      </router-link><span v-else>{{ item.meta.title }}</span>
    </a-breadcrumb-item>
  </a-breadcrumb>
</template>

<script lang="ts">
import { Component, Vue, Prop, Watch } from 'vue-property-decorator';
import { Breadcrumb as ABreadcrumb } from 'ant-design-vue'
import path from 'path'

@Component({
  components: {
    'ABreadcrumb': ABreadcrumb,
    'ABreadcrumbItem': ABreadcrumb.Item
  }
})
export default class Breadcrumb extends Vue {
  
  private name?: string = ''
  
  private breadList: object = {}


  @Watch('$route')
  onRouteChanged(val: any, oldVal: any) {
    this.getBreadcrumb()
  }

  getBreadcrumb () {
    const breadList = {
      '/': { name: 'dashboard', path: '/', meta: { title: '仪表盘' } }
    }
    this.$route.matched.concat().filter(item => item.path).forEach((item) => {
      breadList[path.resolve(item.path)] = item
    })

    this.name = this.$route.name
    this.breadList = breadList
  }

  created() {
    this.getBreadcrumb()
  }
}
</script>

<style lang="less" scoped>

</style>
