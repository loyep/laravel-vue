<template>
  <div v-show="false">
    <div ref="modal" :class="popupClass">
      <div class="nice-tips-overlay" @click="close" />
      <div class="nice-tips-body">
        <div class="nice-tips-content">
          <slot />
        </div>
        <div class="btn-close-tips" @click="close">
          <svg t="1553064665406" class="icon w-32" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3368" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200">
            <defs />
            <path d="M512 12C235.9 12 12 235.9 12 512s223.9 500 500 500 500-223.9 500-500S788.1 12 512 12z m166.3 609.7c15.6 15.6 15.6 40.9 0 56.6-7.8 7.8-18 11.7-28.3 11.7s-20.5-3.9-28.3-11.7L512 568.6 402.3 678.3c-7.8 7.8-18 11.7-28.3 11.7s-20.5-3.9-28.3-11.7c-15.6-15.6-15.6-40.9 0-56.6L455.4 512 345.7 402.3c-15.6-15.6-15.6-40.9 0-56.6 15.6-15.6 40.9-15.6 56.6 0L512 455.4l109.7-109.7c15.6-15.6 40.9-15.6 56.6 0 15.6 15.6 15.6 40.9 0 56.6L568.6 512l109.7 109.7z" p-id="3369" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: 'Popup',
        props: {
            size: {
                type: String,
                default: ''
            }
        },
        data () {
            return {
                pendding: false
            }
        },
        computed: {
            popupClass () {
                let size = ''
                switch (this.size) {
                case 'big': size = 'nice-tips-lg'; break;
                case 'no-padding': size = 'nice-tips-nopd'; break;
                case 'cover': size = 'nice-tips-cover nice-tips-nopd'; break;
                case 'full': size = 'nice-tips-xl'; break;
                case 'middle': size = 'nice-tips-md'; break;
                case 'small': size = 'nice-tips-sm'; break;
                }
                return 'nice-tips ' + size + ' nice-tips-open'
            }
        },
        methods: {
            show () {
                if (this.pendding) return
                this.pendding = true
                this.$refs.modal.classList.remove('nice-tips-close');
                document.body.classList.add('modal-open')
                document.body.append(this.$refs.modal)
                setTimeout(() => {
                    this.pendding = false;
                    this.$refs.modal.classList.add('nice-tips-open');
                }, 200)
            },
            close () {
                if (this.pendding) return
                this.pendding = true
                document.body.classList.remove('modal-open')
                this.$refs.modal.classList.remove('nice-tips-open');
                this.$refs.modal.classList.add('nice-tips-close');
                setTimeout(() => {
                    this.$refs.modal.classList.remove('nice-tips-close');
                    setTimeout(() => {
                        this.pendding = false;
                        this.$refs.modal.remove()
                    }, 200);
                }, 200);
            }
        }

    }
</script>

<style lang="scss" scoped>

/*--------------------------------------------------------------
    POPUP CSS
--------------------------------------------------------------*/
.nice-tips,
.nice-tips-overlay {
    width: 100%;
    height: 100vh;
    top: 0;
    left: 0;
}

.nice-tips {
    position: fixed;
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
    -webkit-justify-content: center;
    justify-content: center;
    pointer-events: none
}

.nice-tips-open {
    z-index: 1031;
}

.nice-tips-overlay {
    position: absolute;
    background: rgba(120, 129, 147, .22);
    opacity: 0;
    -webkit-transition: opacity .3s;
    transition: opacity .3s;
    -webkit-backface-visibility: hidden;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s
}

.nice-tips-open .nice-tips-overlay {
    opacity: 1;
    pointer-events: auto;
}

@supports (-webkit-backdrop-filter:blur(10px)) or (backdrop-filter:blur(10px)) {
    .nice-tips-open .nice-tips-overlay {
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
    }

}
/*--------------------------------------------------------------
    tips body
--------------------------------------------------------------*/
.nice-tips-body {
    position: relative;
    opacity: 0;
    max-width: 400px;
    width: 100%;
}

@media (max-width: 575.98px) {
    .nice-tips-body {
        max-width: 93.3333%;
    }
}

.nice-tips-open .nice-tips-body {
    pointer-events: auto;
}

.nice-tips-xl .nice-tips-body {
    width: 100%;
    max-width: 790px;
}

.nice-tips-scroll .nice-tips-body{
    width: 100%;
    max-width: 790px;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
    -webkit-justify-content: center;
    justify-content: center;
    max-height: calc(100vh - 100px);
    height: calc(100vh - 100px);
}

.nice-tips-lg .nice-tips-body {
    width: 100%;
    max-width: 790px;
}

.nice-tips-md .nice-tips-body {
    max-width: 540px;
    width: 100%;
}

.nice-tips-sm .nice-tips-body {
    max-width: 300px;
    width: auto;
}

.nice-tips-nopd .nice-tips-body {
    max-width: 340px;
}

@media (min-width:768px) and (max-width:991.98px) {
    .nice-tips-scroll .nice-tips-body,
    .nice-tips-xl .nice-tips-body {
        max-width: 670px;
    }

}

@media (max-width:767.98px) {
    .nice-tips-scroll .nice-tips-body,
    .nice-tips-xl .nice-tips-body {
        height: 100vh;
    }
    .nice-tips-md .nice-tips-body {
        padding:1rem;
    }

}

/*--------------------------------------------------------------
    tips body animation
--------------------------------------------------------------*/

.nice-tips.nice-tips-open .nice-tips-body,
.nice-tips.nice-tips-close .nice-tips-body {
    -webkit-animation-duration: .3s;
    animation-duration: .3s;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards
}

.nice-tips.nice-tips-open .nice-tips-body {
    -webkit-animation-name: tips-open;
    animation-name: tips-open
}

.nice-tips.nice-tips-close .nice-tips-body {
    -webkit-animation-name: tips-close;
    animation-name: tips-close
}

@-webkit-keyframes tips-open {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 50px, 0)
    }

    100% {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0)
    }

}

@keyframes tips-open {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 50px, 0);
        transform: translate3d(0, 50px, 0)
    }

    100% {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }

}

@-webkit-keyframes tips-close {
    0% {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0)
    }

    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, 50px, 0)
    }

}

@keyframes tips-close {
    0% {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }

    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, 50px, 0);
        transform: translate3d(0, 50px, 0)
    }

}
/*--------------------------------------------------------------
    tips content
--------------------------------------------------------------*/
.nice-tips-content {
    background: #fff;
    padding: 1.25rem;
    position: relative;
    border-radius: 4px;
    border: 1px solid #f4f5f9;
    box-shadow: 0 10px 50px -5px rgba(6, 39, 67, 0.12);
}
.nice-tips-xl .nice-tips-content{
    padding: 0;
    border: 0;
    width: 100%;
    height: auto;
    overflow: hidden;
}

.nice-tips-scroll .nice-tips-content{
    padding: 0;
    border: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.nice-tips-lg .nice-tips-content {
    padding: 0;
    border: 0;
    border-radius: 0;
}
.nice-tips-sm .nice-tips-content {
    padding: 2rem;
    padding: 1.75rem 2.5rem;
}

.nice-tips-nopd .nice-tips-content {
    padding: 0;
    border: 0;
}

@media (max-width:767.98px) {
    .nice-tips-scroll  .nice-tips-body .nice-tips-content,
    .nice-tips-xl .nice-tips-body .nice-tips-content {
        box-shadow: none;
        border-radius: 0;
        height: 100vh;
    }
}

/*--------------------------------------------------------------
    tips svg color
--------------------------------------------------------------*/

.nice-tips-content .text-success svg path {
    fill: #28a745;
}

.nice-tips-content .text-danger svg path {
    fill: #ffc107;
}

/*--------------------------------------------------------------
    tips close btn
--------------------------------------------------------------*/
.btn-close-tips {
    position: absolute;
    bottom: 0px;
    left: 0;
    width: 100%;
    z-index: 44;
    cursor: pointer;
    transform: translateY(150%);
    text-align: center;
}

.btn-close-tips svg path {
    fill: #fff
}

@media (max-width:767.98px) {
    .nice-tips-scroll  .btn-close-tips{
        transform: translateY(120%);
    }
    .nice-tips-xl .btn-close-tips {
        transform: translateY(-100%);
    }
    .nice-tips-scroll .btn-close-tips svg path ,
    .nice-tips-xl .btn-close-tips svg path {
        fill: #888;
    }

}
@media (min-width:768px) {
    .nice-tips-scroll .btn-close-tips {
        right: 0;
        top: 0;
        bottom: auto;
        left: auto;
        width: auto;
        z-index: 44;
        cursor: pointer;
        transform: translateX(120%);
    }
}

/*
   post cover style
*/
.nice-tips-cover .nice-tips-overlay {
    background: rgb(120, 129, 147);
}

.tips-content-cover {
    max-width: 340px;
    width: 100%;
    padding: 0;
    border: 0;
    border-radius: .22rem;
}

.cover-image {
    position: relative;
    overflow: hidden;
    border-radius: .22rem .22rem 0 0;
    padding: 0;
}

.cover-image img {}

.cover-overlay {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    -webkit-filter: blur(10px);
    filter: blur(20px);
    z-index: -1;
}

.cover-overlay:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
    opacity: .11;
}

.cover-share {
    text-align: center;
    padding: 1rem 0;
    border-top: 1px solid #f4f6f9;
}

.cover-share a {
    color: #8a92a9;
    padding: .25rem;
    margin: .25rem;
    font-size: 1.125rem;
}

.cover-share a:hover {
    color: #062743;
}

.cover-text {
    text-align: center;
    position: absolute;
    top: 0px;
    left: 0;
    width: 100%;
    z-index: 44;
    cursor: pointer;
    transform: translateY(-36px);
    text-align: center;
    color: #fff;
    font-size: .875rem;
}
</style>
