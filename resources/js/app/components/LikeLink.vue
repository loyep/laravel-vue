<template>
  <div @click.stop="handleLike">
    <slot />
  </div>
</template>

<script>
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
                this.$http.post('post-like', {
                    'id': this.id
                }).then(res => {
                    const elItems = document.getElementsByClassName('like-count');
                    for (let i = 0; i < elItems.length; i++) {
                        elItems[i].innerHTML = res.likes_count;
                    }

                    const hearts = document.getElementsByClassName('post-like');
                    for (let i = 0; i < hearts.length; i++) {
                        if (res.is_liked) {
                            hearts[i].classList.add('current')
                        } else {
                            hearts[i].classList.remove('current')
                        }
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
