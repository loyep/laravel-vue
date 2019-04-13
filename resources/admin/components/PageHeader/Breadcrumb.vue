<template>
  <a-breadcrumb class="breadcrumb">
    <a-breadcrumb-item v-for="(item, key) in breadList" :key="key">
      <router-link v-if="item.name != name" :to="{ path: item.path }">{{ item.meta.title }}</router-link>
      <span v-else>{{ item.meta.title }}</span>
    </a-breadcrumb-item>
  </a-breadcrumb>
</template>

<script>
import { Component, Vue, Prop, Watch } from "vue-property-decorator";
import { Breadcrumb as ABreadcrumb } from "ant-design-vue";
import path, { parse } from "path";
import { RawLocation } from "vue-router";

export default {
  name: "Breadcrumb",
  components: {
    ABreadcrumb: ABreadcrumb,
    ABreadcrumbItem: ABreadcrumb.Item
  },
  data() {
    return {
      name: undefined,
      breadList: {}
    };
  },
  watch: {
    $route(val, oldVal) {
      this.getBreadcrumb();
    }
  },
  created() {
    this.getBreadcrumb();
  },
  methods: {
    getBreadcrumb() {
      const breadList = {
        "/": { name: "dashboard", path: "/", meta: { title: "仪表盘" } }
      };

      this.$route.matched
        .concat()
        .filter(item => item.path)
        .forEach(item => {
          if (!item.redirect) {
            breadList[path.resolve(item.path)] = item;
          }
        });

      this.name = this.$route.name;
      this.breadList = breadList;
    }
  }
}
</script>

<style lang="less" scoped>
</style>
