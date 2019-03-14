<template>
  <auth-layout>
    <div class="main">
      <div class="login">
        <h3>登录</h3>
        <a-form :form="form" @submit="handleSubmit">
          <a-form-item>
            <a-input
              v-decorator="[
                'username',
                {
                  rules: [
                    { required: true, message: $t('validation.required', { attribute: $t('validation.attributes.username') }) }
                  ],
                  validateTrigger: ['change', 'blur']
                }
              ]"
              placeholder="用户名或邮箱"
              size="large"
            >
              <template v-slot:prefix>
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
                    { required: true, message: $t('validation.required', { attribute: $t('validation.attributes.password') }) }
                  ],
                  validateTrigger: ['change', 'blur']
                }
              ]"
              placeholder="密码"
              size="large"
              type="password"
            >
              <template v-slot:prefix>
                <a-icon type="lock" style="color:rgba(0,0,0,.25)" />
              </template>
            </a-input>
          </a-form-item>
          <div>
            <a-form-item style="margin-bottom: 0px; margin-top: -12px">
              <a-checkbox v-decorator="[
                'remember_me'
              ]"
              >
                {{ $t('messages.remember_me') }}
              </a-checkbox>
              <router-link :style="{ float: 'right' }" :to="{ name: 'forgot.password' }">
                {{ $t('messages.forgot_password') }}
              </router-link>
            </a-form-item>
            <a-form-item>
              <a-button
                :loading="submitting"
                size="large"
                type="primary"
                htmlType="submit"
                class="submit"
              >
                {{ $t('messages.login') }}
              </a-button>
            </a-form-item>
            <div class="other">
              <span>{{ $t('messages.other_login') }}</span>
              <a-icon type="wechat" class="icon" theme="outlined" />
              <a-icon type="github" class="icon" theme="outlined" />
              <router-link class="register" :to="{ name: 'register' }">
                {{ $t('messages.sign_up') }}
              </router-link>
            </div>
          </div>
        </a-form>
      </div>
    </div>
  </auth-layout>
</template>

<script >
import AuthLayout from '@/layouts/AuthLayout'

export default {
  name: 'Login',
  components: {
    AuthLayout
  },
  data () {
    return {
      form: this.$form.createForm(this),
      submitting: false,
      redirect: undefined
    }
  },
  methods: {
    handleSubmit  (e) {
      e.preventDefault()
      this.form.validateFields((err, values) => {
        if (!err) {
          this.submitting = true
          this.$store.dispatch('auth/Login', values).then((res) => {
            this.submitting = false
            this.$router.push({ path: this.$route.query.redirect || '/' })
            if (res.data.welcome) {
              setTimeout(() => {
                this.$notification.success({
                  message: '欢迎',
                  description: res.data.welcome
                })
              }, 1000)
            }
          }).catch(err => {
            err.showMessages && err.showMessages(this.form)
            this.submitting = false
          })
        }
      })
    }
  }
}

</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.login {

  .icon {
    font-size: 24px;
    color: rgba(0, 0, 0, 0.2);
    margin-left: 16px;
    vertical-align: middle;
    cursor: pointer;
    transition: color 0.3s;

    &:hover {
      color: @primary-color;
    }
  }

  .other {
    text-align: left;
    margin-top: 24px;
    line-height: 22px;

    .register {
      float: right;
    }
  }

  .prefixIcon {
    font-size: @font-size-base;
    color: @disabled-color;
  }

  .submit {
    width: 100%;
    margin-top: 12px;
  }
}

.main {
  width: 368px;
  margin: 0 auto;

  @media screen and (max-width: @screen-sm) {
    width: 95%;
  }

  h3 {
    font-size: 16px;
    margin-bottom: 20px;
  }

  .icon {
    font-size: 24px;
    color: rgba(0, 0, 0, 0.2);
    margin-left: 16px;
    vertical-align: middle;
    cursor: pointer;
    transition: color 0.3s;

    &:hover {
      color: @primary-color;
    }
  }

  .other {
    text-align: left;
    margin-top: 24px;
    line-height: 22px;

    .register {
      float: right;
    }
  }
}

</style>
