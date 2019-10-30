<template>
  <el-form ref="form" :hideRequiredAsterisk="false" :model="form" labelPosition="top" :rules="ruleValidate">
    <el-form-item prop="email" :error="errors.email">
      <el-input v-model="form.email" type="email" placeholder="邮箱" />
    </el-form-item>
    <el-form-item prop="name" :error="errors.name">
      <el-input v-model="form.name" placeholder="用户名" @keyup.enter.native="handleSubmit" />
    </el-form-item>
    <el-form-item prop="password" :error="errors.password">
      <el-input v-model="form.password" type="password" placeholder="密码" @keyup.enter.native="handleSubmit" />
    </el-form-item>
    <el-button class="mt-3 btn btn-block" type="primary" :loading="loading" @click="handleSubmit">
      立即注册
    </el-button>
  </el-form>
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
