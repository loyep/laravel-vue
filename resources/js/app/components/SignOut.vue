<template>
  <a href="javascript:;" @click="handleLogout">
    <slot />
  </a>
</template>

<script>
    export default {
        name: 'SignOut',
        methods: {
            handleLogout () {
                this.$http.post('/logout').then(res => {
                    window.location.reload()
                })
            }
        }
    }
</script>
