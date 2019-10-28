<template>
  <i-form ref="form" :model="form" labelPosition="top" :rules="ruleValidate">
    <form-item prop="email" :error="errors.email">
      <i-input v-model="form.email" name="email" type="email" placeholder="邮箱" />
    </form-item>
    <form-item prop="name" :error="errors.name">
      <i-input v-model="form.name" name="name" placeholder="用户名" />
    </form-item>
    <form-item prop="password" :error="errors.password">
      <i-input v-model="form.password" name="password" type="password" placeholder="密码" @enter="handleSubmit" />
    </form-item>
    <i-button class="mt-3" type="primary" long :loading="loading" @click="handleSubmit">
      立即注册
    </i-button>
  </i-form>
</template>

<script>
    export default {
        name: 'Register',
        data () {
            return {
                form: {
                    password: '',
                    email: '',
                    name: ''
                },
                errors: {},
                loading: false,
                ruleValidate: {
                    email: [ { required: true, trigger: 'blur', message: '邮箱 不能为空' },
                             { type: 'email', trigger: 'blur', message: '邮箱 不是一个合法的邮箱' } ],
                    name: [ { required: true, trigger: 'blur', message: '用户名 不能为空' } ],
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
                this.$http.post('/register', this.form).then(res => {
                    window.location.replace(res.redirect || '/')
                }).catch(err => {
                    this.errors = err.errors || {}
                }).finally(() => {
                    this.loading = false
                })
            }
        }
    }
</script>
