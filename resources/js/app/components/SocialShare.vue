<template>
  <div class="post-social">
    <a :href="weiboUrl" target="_blank" class="btn btn-light btn-icon btn-weibo btn-rounded btn-md">
      <span><i class="iconfont icon-weibo" /></span>
    </a>
    <a href="javascript:;" class="btn btn-light btn-icon btn-weixin btn-rounded btn-md" @click="shareWechat">
      <span><i class="iconfont icon-wechat" /></span>
    </a>
    <a :href="qqUrl" target="_blank" class="btn btn-light btn-icon btn-qq btn-rounded btn-md">
      <span><i class="iconfont icon-qq" /></span>
    </a>
    <a :href="facebookUrl" target="_blank" class="btn btn-light btn-icon btn-facebook btn-rounded btn-md">
      <span><i class="iconfont icon-facebook" /></span>
    </a>
    <a :href="twitterUrl" target="_blank" class="btn btn-light btn-icon btn-twitter btn-rounded btn-md">
      <span><i class="iconfont icon-twitter" /></span>
    </a>
    <a :href="linkedinUrl" target="_blank" class="btn btn-light btn-icon btn-linkedin btn-rounded btn-md">
      <span><i class="iconfont icon-linkedin" /></span>
    </a>

    <popup ref="popup">
      <div class="text-center">
        <h6 class="py-1">
          微信扫一扫 分享朋友圈
        </h6>
        <img :src="wechatUrl" alt="微信扫一扫 分享朋友圈" style="width:100%;height:auto;">
        <p class="text-muted text-xs">
          (在微信内长按二维码)
        </p>
      </div>
    </popup>
  </div>
</template>

<script>
    import Popup from './Popup.vue'
    export default {
        name: 'SocialShare',
        components: {
            Popup
        },
        props: {
            qrcode: {
                type: String,
                default: ''
            }
        },
        data () {
            return {
                qqUrl: '',
                twitterUrl: '',
                facebookUrl: '',
                weiboUrl: '',
                wechatUrl: '',
                linkedinUrl: ''
            }
        },
        mounted () {
            const description = document.head.querySelector('meta[name="description"]').content || '';
            const desc = encodeURIComponent(description);
            const title = encodeURIComponent(document.title);
            const url = encodeURIComponent(location.href)
            const pic = encodeURIComponent('')
            this.linkedinUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${url}&title=${title}&summary=${desc}`
            this.facebookUrl = `https://www.facebook.com/sharer.php?u=${url}`
            this.twitterUrl = `https://twitter.com/intent/tweet?url=${url}`
            this.qqUrl = `https://connect.qq.com/widget/shareqq/index.html?url=${url}&title=${title}&pics=${pic}&summary=${desc}`
            this.weiboUrl = `//service.weibo.com/share/share.php?url=${url}&type=button&language=zh_cn&title=${description ? encodeURIComponent(`【${document.title}】${description}`) : title}&pic=${pic}&searchPic=true`
            this.wechatUrl = this.qrcode
        },
        methods: {
            shareWechat () {
                this.$refs.popup.show()
            }
        }
    }
</script>
