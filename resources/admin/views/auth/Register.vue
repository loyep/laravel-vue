<template>
  <auth-layout>
    <div class="main">
      <h3>
        注册
      </h3>
      <a-form :form="form" @submit="handleSubmit">
        <a-form-item>
          <a-input
            v-decorator="[
              'name',
              {
                rules: [
                  { required: true, message: '用户名不能为空' }
                ],
                validateTrigger: ['change', 'blur']
              }
            ]"
            size="large"
            placeholder="用户名"
          >
            <template #prefix>
              <a-icon type="user" style="color:rgba(0,0,0,.25)" />
            </template>
          </a-input>
        </a-form-item>
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
          <a-input
            v-decorator="[
              'password',
              {
                rules: [
                  { required: true, message: '密码不能为空' }
                ],
                validateTrigger: ['change', 'blur']
              }
            ]"
            size="large"
            placeholder="密码"
            type="password"
          >
            <template #prefix>
              <a-icon type="lock" style="color:rgba(0,0,0,.25)" />
            </template>
          </a-input>
        </a-form-item>
        <a-form-item>
          <a-input
            v-decorator="[
              'password_confirmation',
              {
                rules: [
                  { required: true, message: '确认密码不能为空' }
                ],
                validateTrigger: ['change', 'blur']
              }
            ]"
            size="large"
            placeholder="确认密码"
            type="password"
          >
            <template #prefix>
              <a-icon type="lock" style="color:rgba(0,0,0,.25)" />
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
            注册
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
import { setFiledsWithErrors } from "@/utils/form";
import { WrappedFormUtils } from 'ant-design-vue/types/form/form';

@Component({
  components: {
    AuthLayout
  }
})
export default class Register extends Vue {
  
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
        this.$store.dispatch('auth/Register', values).then((res) => {
          this.submitting = false
          this.$router.push(<any>{ path: this.$route.query.redirect || '/' })
        }).catch(err => {
          this.submitting = false
          setFiledsWithErrors(this.form, err);
        })
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
