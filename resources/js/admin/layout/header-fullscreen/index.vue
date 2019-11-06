<template>
  <span class="el-layout-header-trigger el-layout-header-trigger-min" @click="toggleFullscreen">
    <i v-show="!isFullscreen" class="el-icon-full-screen" />
    <i v-show="isFullscreen" class="el-icon-rank" />
  </span>
</template>
<script>
    import { mapState, mapActions } from 'vuex'

    export default {
        name: 'HeaderFullscreen',
        computed: {
            ...mapState('layout', [
                'isFullscreen'
            ])
        },
        methods: {
            ...mapActions('layout', [
                'toggleFullscreen'
            ])
        }
    }
</script>
