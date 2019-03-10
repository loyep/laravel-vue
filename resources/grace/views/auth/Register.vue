<template>
  <auth-layout>
    <div class="main">
      <h3>
        {{ $t('layout.auth.register.name') }}
      </h3>
      <a-form :form="form" @submit="handleSubmit">
        <a-form-item>
          <a-input
            v-decorator="[
              'name',
              {
                rules: [
                  { required: true, message: $t('validation.required', { attribute: $t('validation.attributes.username') }) }
                ],
                validateTrigger: ['change', 'blur']
              }
            ]"
            size="large"
            :placeholder="$t('validation.attributes.username')"
          >
            <template v-slot="prefix">
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
                  { required: true, message: $t('validation.required', { attribute: $t('validation.attributes.email') }) },
                  { type: 'email', message: $t('validation.wrong-format', { attribute: $t('validation.attributes.email') }) }
                ],
                validateTrigger: ['change', 'blur']
              }
            ]"
            size="large"
            :placeholder="$t('validation.attributes.email')"
          >
            <template v-slot="prefix">
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
            size="large"
            :placeholder="$t('validation.attributes.password')"
            type="password"
          >
            <template v-slot="prefix">
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
                  { required: true, message: $t('validation.required', { attribute: $t('validation.attributes.password_confirmation') }) }
                ],
                validateTrigger: ['change', 'blur']
              }
            ]"
            size="large"
            :placeholder="$t('validation.attributes.password_confirmation')"
            type="password"
          >
            <template v-slot="prefix">
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
            {{ $t('messages.register') }}
          </a-button>
          <router-link class="login" :to="{ name: 'login' }">
            {{ $t('messages.sign_in') }}
          </router-link>
        </a-form-item>
      </a-form>
    </div>
  </auth-layout>
</template>

<script >
import AuthLayout from '@/layouts/AuthLayout'

export default {
  name: 'Register',
  components: {
    AuthLayout
  },
  data () {
    return {
      submitting: false,
      form: this.$form.createForm(this)
    }
  },
  methods: {
    handleSubmit  (e) {
      e.preventDefault()
      this.form.validateFields((err, values) => {
        if (!err) {
          this.submitting = true
          this.$store.dispatch('auth/Register', values).then((res) => {
            this.submitting = false
            this.$router.push({ path: this.$route.query.redirect || '/' })
          }).catch(err => {
            console.log(err)
            // this.form.showMessages(err)
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
