<template>
  <page-view :hideBread="true" title="仪表盘">
    <template #pageLogo>
      <img :src="user.avatar" class="logo">
    </template>
    <template #pageContent>
      交互专家 |蚂蚁金服－某某某事业群－某某平台部－某某技术部－UED
    </template>
  </page-view>
</template>

<script>
import PageView from '@/layouts/PageLayout/PageView'
import { mapGetters } from 'vuex'

export default {
  name: 'Dashboard',
  components: {
    PageView
  },
  computed: {
    ...mapGetters('auth', {
      user: 'user'
    })
  }
}
</script>

<style lang="scss" scoped>
</style>
