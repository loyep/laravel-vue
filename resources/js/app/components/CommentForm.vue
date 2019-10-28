<template>
  <i-form class="comment-form">
    <div class="d-flex w-100">
      <div class="flex-fill comment-from-author">
        <div class="comment-form-info">
          <div class="row-sm my-n2 pb-2">
            <div class="col-12 col-lg-4">
              <form-item>
                <i-input placeholder="Nickname" />
              </form-item>
            </div>
            <div class="col-12 col-lg-4">
              <form-item>
                <i-input type="email" placeholder="E-Mail" />
              </form-item>
            </div>
            <div class="col-12 col-lg-4">
              <form-item>
                <i-input type="url" placeholder="Web Site" />
              </form-item>
            </div>
          </div>
        </div>
        <div class="comment-form-text">
          <form-item prop="comment" :error="errors.comment">
            <i-input type="textarea" :rows="3" />
          </form-item>
          <div class="form-submit text-right">
            <i-button class="mt-2" type="primary" @click="handleSubmit">
              提交评论
            </i-button>
          </div>
        </div>
      </div>
    </div>
  </i-form>
</template>

<script>
    export default {
        name: 'LoginForm',
        data () {
            return {
                errors: {

                }
            }
        },
        created () {

        },
        methods: {
            handleSubmit () {

            }
        }
    }
</script>
