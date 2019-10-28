<template>
  <div class="container">
    <card class="p-2 mb-3">
      <i-form ref="form" :model="form" labelPosition="top" :rules="ruleValidate">
        <form-item prop="display_name" label="昵称" :error="errors.display_name">
          <i-input v-model="form.display_name" />
        </form-item>
        <form-item prop="email" label="邮箱" :error="errors.email">
          <i-input v-model="form.email " />
        </form-item>
        <form-item prop="bio" label="简介" :error="errors.bio">
          <i-input v-model="form.bio" type="textarea" />
        </form-item>
        <i-button :loading="loading" type="primary" class="mb-2" @click="handleSubmit">
          确认修改
        </i-button>
      </i-form>
    </card>
    <card class="p-2 mb-3">
      <list>
        <list-item>
          <div class="text-sm pr-2">
            <div>更换封面</div>
            <small class="form-text text-muted">个人主页顶部自定义显示的封面</small>
          </div>
          <div class="flex-fill" />
          <i-button>编辑</i-button>
        </list-item>
        <list-item>
          <div class="text-sm pr-2">
            <div>登录密码</div>
            <small class="form-text text-muted">互联网账号存在被盗风险，建议您定期更改密码以保护账户安全。</small>
          </div>
          <div class="flex-fill" />
          <i-button>编辑</i-button>
        </list-item>
        <list-item>
          <div class="text-sm pr-2">
            <div>
              绑定手机
            </div>
            <small class="form-text text-muted">
              您绑定的手机： {{ user.mobile }}
            </small>
          </div>
          <div class="flex-fill" />
          <i-button>编辑</i-button>
        </list-item>
        <list-item>
          <div class="text-sm pr-2">
            <div>
              绑定邮箱
            </div>
            <small class="form-text text-muted">
              您绑定的邮箱： {{ user.email }}
            </small>
          </div>
          <div class="flex-fill" />
          <i-button>绑定</i-button>
        </list-item>
        <list-item>
          <div class="text-sm pr-2">
            <div>
              绑定微博
            </div>
            <small class="form-text text-muted">绑定您的微博账号，一键登录账号更方便：</small>
          </div>
          <div class="flex-fill" />
          <i-button>绑定</i-button>
        </list-item>
        <list-item>
          <div class="text-sm pr-2">
            <div>
              绑定 QQ
            </div>
            <small class="form-text text-muted">绑定您的 QQ，一键登录账号更方便：</small>
          </div>
          <div class="flex-fill" />
          <i-button>绑定</i-button>
        </list-item>
        <list-item>
          <div class="text-sm pr-2">
            <div>
              绑定微信
            </div>
            <small class="form-text text-muted">绑定您的微信，一键登录账号更方便：</small>
          </div>
          <div class="flex-fill" />
          <i-button>绑定</i-button>
        </list-item>
      </list>
    </card>
  </div>
</template>

<script>
    export default {
        name: 'Profile',
        data () {
            return {
                user: {

                },
                form: {
                    display_name: '',
                    email: '',
                    bio: ''
                },
                errors: {},
                loading: false,
                ruleValidate: {
                    display_name: [ { required: true, trigger: 'blur', message: '昵称 不能为空' } ],
                    email: [ { required: true, trigger: 'blur', message: '邮箱 不能为空' },
                             { type: 'email', trigger: 'blur', message: '邮箱 不是一个合法的邮箱' } ]
                }
            }
        },
        mounted () {
            this.$http.get('profile').then(res => {
                const { user } = res
                this.user = user
                this.form = {
                    email: user.email,
                    display_name: user.display_name,
                    bio: user.bio
                }
                console.log(this.form)
            })
        },
        methods: {
            handleSubmit () {
                console.log(this.form)
                this.$refs.form.validate(valid => {
                    if (valid) {
                        this.submitForm()
                        console.log(this.form)
                    }
                })
            },
            submitForm () {
                this.loading = true
                this.errors = {}
                this.$http.post('profile', this.form).then(res => {
                    // window.location.replace(res.redirect || '/')
                    const { bio, email, display_name } = res.user
                    this.form = {
                        bio, email, display_name
                    }
                }).catch(err => {
                    this.errors = err.errors || {}
                }).finally(() => {
                    setTimeout(() => {
                        this.loading = false
                    }, 500)
                })
            }
        }
    }
</script>
