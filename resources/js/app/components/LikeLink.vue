<template>
  <div @click.stop="handleLike">
    <slot />
  </div>
</template>

<script>
    import $ from 'jquery'
    export default {
        name: 'LikeLink',
        props: {
            id: {
                type: String,
                required: true
            }
        },
        data () {
            return {
                loading: false
            }
        },
        methods: {
            handleLike () {
                if (this.loading) {
                    return
                }
                this.loading = true
                this.$http.post('article-like', {
                    'id': this.id
                }).then(res => {
                    console.log(res)
                    $('.like-count').html(res.likes_count)
                    if (res.is_liked) {
                        $('.post-like').addClass('current')
                    } else {
                        $('.post-like').removeClass('current')
                    }
                }).finally(() => {
                    setTimeout(() => {
                        this.loading = false
                    }, 300)
                })
                console.log('handleLike')
            }
        }
    }
</script>
