<template>
  <i-form ref="form" :model="form" labelPosition="top" :rules="ruleValidate">
    <form-item prop="email" :error="errors.email">
      <i-input v-model="form.email" name="email" type="email" placeholder="邮箱" />
    </form-item>
    <i-button class="mt-3" type="primary" long :loading="loading" @click="handleSubmit">
      下一步
    </i-button>
  </i-form>
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
