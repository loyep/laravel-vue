<template>
  <a-breadcrumb class="breadcrumb">
    <a-breadcrumb-item v-for="(item, index) in breadList" :key="index">
      <router-link v-if="item.name != name" :to="{ path: item.path }">
        {{ item.meta.title }}
      </router-link><span v-else>{{ item.meta.title }}</span>
    </a-breadcrumb-item>
  </a-breadcrumb>
</template>

<script>
import { Breadcrumb } from 'ant-design-vue'
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
      const breadList = []
      breadList.push({ name: 'dashboard', path: '/', meta: { title: '首页' } })
      const routes = this.$route.matched.concat().filter(item => item.path)
      this.name = this.$route.name
      this.breadList = breadList.concat(routes)
    }
  }
}
</script>

<style lang="less" scoped>

</style>
