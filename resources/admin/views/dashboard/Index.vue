<template>
  <page-view
    :hideBread="true"
    title="仪表盘"
    content="交互专家 |蚂蚁金服－某某某事业群－某某平台部－某某技术部－UED"
    :logo="user.avatar"
  >Dashboard</page-view>
</template>

<script lang="ts">
import { Component, Vue, Prop } from "vue-property-decorator";
import PageView from "@/layouts/PageLayout/PageView.vue";
import { namespace } from "vuex-class";

const authModule = namespace("auth");

@Component({
  components: {
    PageView
  }
})
export default class Dashboard extends Vue {
  @authModule.Getter("user")
  user: any;
}
</script>

<style lang="less" scoped>
</style>
