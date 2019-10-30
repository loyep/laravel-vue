<template>
  <el-form ref="form" :hideRequiredAsterisk="false" :model="form" labelPosition="top" :rules="ruleValidate">
    <el-form-item prop="username" :error="errors.username">
      <el-input v-model="form.username" placeholder="邮箱 / 用户名" autofocus @keyup.enter.native="handleSubmit" />
    </el-form-item>
    <el-form-item prop="password" :error="errors.password">
      <el-input v-model="form.password" type="password" placeholder="密码" @enter="handleSubmit" @keyup.enter.native="handleSubmit" />
    </el-form-item>
    <el-button class="mt-2 btn btn-block" type="primary" :loading="loading" @click="handleSubmit">
      登录
    </el-button>
  </el-form>
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
