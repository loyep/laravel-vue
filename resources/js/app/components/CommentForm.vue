<template>
  <el-form class="comment-form">
    <div class="d-flex w-100">
      <div class="flex-fill comment-from-author">
        <div class="comment-form-info">
          <div class="row-sm my-n2 pb-2">
            <div class="col-12 col-lg-4">
              <el-form-item>
                <el-input placeholder="Nickname" />
              </el-form-item>
            </div>
            <div class="col-12 col-lg-4">
              <el-form-item>
                <el-input type="email" placeholder="E-Mail" />
              </el-form-item>
            </div>
            <div class="col-12 col-lg-4">
              <el-form-item>
                <el-input type="url" placeholder="Web Site" />
              </el-form-item>
            </div>
          </div>
        </div>
        <div class="comment-form-text">
          <el-form-item prop="comment" :error="errors.comment">
            <el-input type="textarea" :rows="3" />
          </el-form-item>
          <div class="form-submit text-right">
            <el-button class="mt-2" type="primary" @click="handleSubmit">
              提交评论
            </el-button>
          </div>
        </div>
      </div>
    </div>
  </el-form>
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
