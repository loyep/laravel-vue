<template>
  <div class="search-link" @click.stop="handleSearch">
    <slot />
    <popup ref="popup" size="full">
      <slot name="content" />
    </popup>
  </div>
</template>

<script>
    import Popup from './Popup.vue'
    export default {
        name: 'SearchLink',
        components: {
            Popup
        },
        props: {
            image: {
                type: String,
                default: ''
            },
            action: {
                type: String,
                default: ''
            }
        },
        computed: {
            backgroundStyles () {
                return {
                    backgroundImage: 'url(' + this.image + ')'
                }
            }
        },
        methods: {
            handleSearch () {
                this.$refs.popup.show()
            }
        }
    };
</script>

<style lang="scss" scoped>
.search-link {
  cursor: pointer;
}
</style>
