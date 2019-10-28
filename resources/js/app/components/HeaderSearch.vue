<template>
  <div @click="handleSearch">
    <slot />
  </div>
</template>

<script>
    export default {
        name: 'HeaderSearch',
        data () {
            return {
                visible: false
            };
        },
        methods: {
            handleSearch () {
                this.visible = true;
            }
        }
    };
</script>
