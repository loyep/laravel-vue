<template>
  <i-form ref="form" :model="form" labelPosition="top" :rules="ruleValidate">
    <form-item prop="username" :error="errors.username">
      <i-input v-model="form.username" name="username" autofocus placeholder="邮箱 / 用户名" @enter="handleSubmit" />
    </form-item>
    <form-item prop="password" :error="errors.password">
      <i-input v-model="form.password" name="password" type="password" placeholder="密码" @enter="handleSubmit" />
    </form-item>
    <i-button class="mt-2" type="primary" long :loading="loading" @click="handleSubmit">
      登录
    </i-button>
  </i-form>
</template>

<script>
    export default {
        name: 'Login',
        data () {
            return {
                form: {
                    username: '',
                    password: ''
                },
                errors: {},
                loading: false,
                ruleValidate: {
                    username: [ { required: true, trigger: 'blur', message: '用户名 不能为空' } ],
                    password: [ { required: true, trigger: 'blur', message: '密码 不能为空' } ]
                }
            }
        },
        methods: {
            handleSubmit () {
                this.$refs.form.validate(valid => {
                    if (valid) {
                        this.submitForm()
                    }
                })
            },
            submitForm () {
                this.loading = true
                this.errors = {}
                this.$http.post('/login', this.form).then(res => {
                    const { redirect } = this.$route.query || {}
                    window.location.replace(redirect || res.redirect || '/')
                }).catch(err => {
                    this.errors = err.errors || {}
                }).finally(() => {
                    this.loading = false
                })
            }
        }
    }
</script>
