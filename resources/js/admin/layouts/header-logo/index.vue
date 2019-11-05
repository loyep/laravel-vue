<template>
  <a class="el-layout-header-logo" :class="{ 'el-layout-header-logo-stick': !isMobile }" to="/">
    <img v-if="isMobile" src="@assets/images/logo-small.png">
    <img v-else-if="headerTheme === 'light'" src="@assets/images/logo.png">
    <img v-else src="@assets/images/logo-dark.png">
  </a>
</template>
<script>
    import { mapState } from 'vuex'

    export default {
        name: 'HeaderLogo',
        computed: {
            ...mapState('layout', [
                'isMobile',
                'headerTheme'
            ])
        }
    }
</script>
