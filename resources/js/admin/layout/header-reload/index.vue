<template>
  <span class="el-layout-header-trigger" :class="{ 'el-layout-header-trigger-min': showSiderCollapse }" @click="handleReload">
    <i class="el-icon-refresh-right" />
  </span>
</template>
<script>
    import { mapState } from 'vuex'

    export default {
        name: 'HeaderReload',
        computed: {
            ...mapState('layout', [
                'isMobile',
                'showSiderCollapse'
            ])
        },
        methods: {
            handleReload () {
                this.$emit('reload')
            }
        }
    }
</script>
