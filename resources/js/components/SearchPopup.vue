<template>
  <a href="#" class="nav-link search-popup" @click="handleSearch">
    <i class="text-lg iconfont icon-sousuo"></i>
  </a>
</template>

<script>
export default {
  name: "SearchPopup",
  methods: {
    handleSearch() {
      console.log(111);
    }
  }
};
</script>
