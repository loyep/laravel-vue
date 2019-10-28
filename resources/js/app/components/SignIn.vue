<template>
  <a href="javascript:;" @click="showModal">
    <slot />
    <Modal
      v-model="visible"
      :width="340"
      :footerHide="true"
      className="vertical-center-modal"
    >
      <div class="text-white text-center bg-dark bg-img px-4 py-5" :style="{ borderRadius: '6px', backgroundImage: `url(${require('@assets/images/bg.jpg')})` }">
        <div class="h3 text-white mt-2">
          每日签到
        </div>
        <div class="font-theme text-sm text-light">
          — 2019/10/25 —
        </div>
      </div>
      <div class="px-3 py-4">
        <div class="insign-date-line">
          <div class="row no-gutters text-center">
            <div class="col day-1 ">
              <div class="text-xs text-muted mb-1">
                +0
              </div>
              <span class="btn btn-icon btn-light btn-rounded">
                <span>
                  1
                </span>
              </span>
            </div>
            <div class="col day-2 ">
              <div class="text-xs text-muted mb-1">
                +1
              </div>
              <span class="btn btn-icon btn-light btn-rounded">
                <span>
                  2
                </span>
              </span>
            </div>
            <div class="col day-3 ">
              <div class="text-xs text-muted mb-1">
                +1
              </div>
              <span class="btn btn-icon btn-light btn-rounded">
                <span>
                  3
                </span>
              </span>
            </div>
            <div class="col day-4 ">
              <div class="text-xs text-muted mb-1">
                +1
              </div>
              <span class="btn btn-icon btn-light btn-rounded">
                <span>
                  4
                </span>
              </span>
            </div>
            <div class="col day-5 ">
              <div class="text-xs text-muted mb-1">
                +1
              </div>
              <span class="btn btn-icon btn-light btn-rounded">
                <span>
                  5
                </span>
              </span>
            </div>
            <div class="col day-6 ">
              <div class="text-xs text-muted mb-1">
                +2
              </div>
              <span class="btn btn-icon btn-light btn-rounded">
                <span>
                  6
                </span>
              </span>
            </div>
            <div class="col day-7 ">
              <div class="text-xs text-muted mb-1">
                +2
              </div>
              <span class="btn btn-icon btn-light btn-rounded">
                <span>
                  7
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="insign-date-action mt-4 mb-1 mx-2">
          <i-button long shape="circle" type="primary">
            签到
          </i-button>
          <!--                        <button class="btn btn-dark btn-block btn-rounded sign-in" data-nonce="addc2c3047">签到</button>-->
        </div>
      </div>
    </Modal>
  </a>
</template>

<script>
    export default {
        name: 'SignIn',
        data () {
            return {
                visible: false
            }
        },
        methods: {
            showModal () {
                this.visible = true
            }
        }
    }
</script>

<style lang="less">
    .vertical-center-modal {
        display: flex;
        align-items: center;
        justify-content: center;
        .ivu-modal-body {
            padding: 0;
        }
        .ivu-modal{
            top: 0;
        }
    }
</style>
