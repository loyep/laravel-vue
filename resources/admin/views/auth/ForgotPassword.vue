<template>
  <auth-layout>
    <div class="main">
      <h3>
        重置密码
      </h3>
      <a-form :form="form" @submit="handleSubmit">
        <a-form-item>
          <a-input
            v-decorator="[
              'email',
              {
                rules: [
                  { required: true, message: '邮箱不能为空' },
                  { type: 'email', message: '邮箱格式错误' }
                ],
                validateTrigger: ['change', 'blur']
              }
            ]"
            size="large"
            placeholder="邮箱"
          >
            <template #prefix>
              <a-icon type="mail" style="color:rgba(0,0,0,.25)" />
            </template>
          </a-input>
        </a-form-item>
        <a-form-item>
          <a-button
            :loading="submitting"
            size="large"
            type="primary"
            class="submit"
            htmlType="submit"
          >
            发送密码重置链接
          </a-button>
          <router-link class="login" :to="{ name: 'login' }">
            使用已有账户登录
          </router-link>
        </a-form-item>
      </a-form>
    </div>
  </auth-layout>
</template>

<script lang="ts">
import AuthLayout from '@/layouts/AuthLayout/index.vue';
import { Component, Vue } from 'vue-property-decorator';
import { WrappedFormUtils } from 'ant-design-vue/types/form/form';
import { setFiledsWithErrors } from "@/utils/form";
import { resetPass } from '@/api/auth'

@Component({
  components: {
    AuthLayout
  }
})
export default class ForgotPassword extends Vue {

  private submitting = false

  private form: WrappedFormUtils

  beforeCreate() {
    this.form = this.$form.createForm(this)
  }

  handleSubmit  (e: Event) {
      e.preventDefault()
      this.form.validateFields((err, values) => {
        if (!err) {
          this.submitting = true
          resetPass(values).then(res => {
            this.submitting = false
            if (!res.data.error) {
              this.$notification.success({
                message: "提示",
                description: '发送邮件成功'
              });            
            }
          }
          // this.$store.dispatch('auth/Register', values).then((res) => {
          // this.submitting = false
          // this.$router.push({ path: this.$route.query.redirect || '/' })
          // }).catch(err => {
          // console.log(err)
          // this.form.showMessages(err)
          // this.submitting = false
          // })
        }
      })
    }
}

</script>

<style lang="less" scoped>

@import '~@/styles/variables.less';

.main {
  width: 368px;
  margin: 0 auto;

  h3 {
    font-size: 16px;
    margin-bottom: 20px;
  }

  .getCaptcha {
    display: block;
    width: 100%;
  }

  .submit {
    width: 50%;
  }

  .login {
    float: right;
    line-height: @btn-height-lg;
  }
}

.success,
.warning,
.error {
  transition: color 0.3s;
}

.success {
  color: @success-color;
}

.warning {
  color: @warning-color;
}

.error {
  color: @error-color;
}

.progress-pass > .progress {
  :global {
    .ant-progress-bg {
      background-color: @warning-color;
    }
  }
}

</style>
