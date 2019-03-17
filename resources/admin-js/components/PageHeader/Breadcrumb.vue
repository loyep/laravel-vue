<template>
  <a-breadcrumb class="breadcrumb">
    <a-breadcrumb-item v-for="(item, key) in breadList" :key="key">
      <router-link v-if="item.name != name" :to="{ path: item.path }">
        {{ item.meta.title }}
      </router-link><span v-else>{{ item.meta.title }}</span>
    </a-breadcrumb-item>
  </a-breadcrumb>
</template>

<script>
import { Breadcrumb } from 'ant-design-vue'
import path from 'path'
export default {
  name: 'Breadcrumb',
  components: {
    'ABreadcrumb': Breadcrumb,
    'ABreadcrumbItem': Breadcrumb.Item
  },
  data () {
    return {
      name: '',
      breadList: []
    }
  },
  watch: {
    $route () {
      this.getBreadcrumb()
    }
  },
  created () {
    this.getBreadcrumb()
  },
  methods: {
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
  }
}
</script>

<style lang="less" scoped>

</style>
