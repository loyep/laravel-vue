<template>
  <el-form ref="form" :hideRequiredAsterisk="false" :model="form" labelPosition="top" :rules="ruleValidate">
    <el-form-item prop="email" :error="errors.email">
      <el-input v-model="form.email" type="email" placeholder="邮箱" />
    </el-form-item>
    <el-button class="mt-3 btn btn-block" type="primary" :loading="loading" @click="handleSubmit">
      下一步
    </el-button>
  </el-form>
</template>

<script>
    export default {
        name: 'RestPass',
        data () {
            return {
                form: {
                    email: ''
                },
                errors: {},
                loading: false,
                ruleValidate: {
                    email: [ { required: true, trigger: 'blur', message: '邮箱 不能为空' },
                             { type: 'email', trigger: 'blur', message: '邮箱 不是一个合法的邮箱' } ]
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
                this.$http.post('password/email', this.form).then(res => {
                    // window.location.replace(res.redirect || '/')
                    console.log(res)
                }).catch(err => {
                    this.errors = err.errors || {}
                }).finally(() => {
                    this.loading = false
                })
            }
        }
    }
</script>
