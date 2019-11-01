<template>
  <a href="javascript:;" @click.stop="handleFavorite">
    <slot />
  </a>
</template>

<script>
    export default {
        name: 'FavoriteLink',
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
            handleFavorite () {
                if (this.loading) {
                    return
                }
                this.loading = true
                this.$http.post('post-favorite', {
                    'id': this.id
                }).then(res => {
                    const elItems = document.getElementsByClassName('collection-count');
                    const count = res.favorites_count
                    for (let i = 0; i < elItems.length; i++) {
                        elItems[i].innerHTML = count;
                    }

                    const hearts = document.getElementsByClassName('post-collection');
                    for (let i = 0; i < hearts.length; i++) {
                        if (res.is_favorited) {
                            hearts[i].classList.add('current')
                        } else {
                            hearts[i].classList.remove('current')
                        }
                    }

                    document.querySelector('.post-collection .el-badge__content').innerHTML = count > 99 ? '99+' : count

                    if (res.is_favorited) {
                        this.$notify({
                            title: '收藏',
                            message: '谢谢收藏',
                            type: 'success',
                            showClose: false
                        });
                    } else {
                        this.$notify({
                            title: '收藏',
                            message: '取消收藏',
                            type: 'warning',
                            showClose: false
                        });
                    }
                }).finally(() => {
                    setTimeout(() => {
                        this.loading = false
                    }, 300)
                })
            }
        }
    }
</script>
