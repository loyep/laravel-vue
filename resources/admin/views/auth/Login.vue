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
                    { required: true, message: '用户名不能为空' }
                  ],
                  validateTrigger: ['change', 'blur']
                }
              ]"
              placeholder="用户名或邮箱"
              size="large"
            >
              <template v-slot:prefix>
                <a-icon type="mail" style="color:rgba(0,0,0,.25)"/>
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
              placeholder="密码"
              size="large"
              type="password"
            >
              <template v-slot:prefix>
                <a-icon type="lock" style="color:rgba(0,0,0,.25)"/>
              </template>
            </a-input>
          </a-form-item>
          <div>
            <a-form-item style="margin-bottom: 0px; margin-top: -12px">
              <a-checkbox v-decorator="[
                'remember_me'
              ]">记住我</a-checkbox>
              <router-link :style="{ float: 'right' }" :to="{ name: 'forgot.password' }">忘记密码</router-link>
            </a-form-item>
            <a-form-item>
              <a-button
                :loading="submitting"
                size="large"
                type="primary"
                htmlType="submit"
                class="submit"
              >登录</a-button>
            </a-form-item>
            <div class="other">
              <span>其他登录方式</span>
              <a-icon type="wechat" class="icon" theme="outlined"/>
              <a-icon type="github" class="icon" theme="outlined"/>
              <router-link class="register" :to="{ name: 'register' }">注册账号</router-link>
            </div>
          </div>
        </a-form>
      </div>
    </div>
  </auth-layout>
</template>

<script lang="ts">
import AuthLayout from "@/layouts/AuthLayout/index.vue";
import { Button } from 'ant-design-vue'
import { Component, Vue } from "vue-property-decorator";
import { Action } from "vuex-class";
import { setFiledsWithErrors } from "@/utils/form";
import { WrappedFormUtils } from "ant-design-vue/types/form/form";

@Component({
  components: {
    AuthLayout,
    AButton: Button
  }
})
export default class Login extends Vue {
  private submitting = false;

  private form: WrappedFormUtils;

  beforeCreate() {
    this.form = this.$form.createForm(this);
  }

  handleSubmit(e: Event) {
    e.preventDefault();
    this.form.validateFields((err, values) => {
      if (!err) {
        this.submitting = true;
        this.$store
          .dispatch("auth/Login", values)
          .then(res => {
            this.submitting = false;
            this.$router.push(<any>{
              path: this.$route.query.redirect || "/"
            });

            const data = res.data

            if (data.welcome) {
              setTimeout(() => {
                this.$notification.success({
                  message: "欢迎",
                  description: data.welcome
                });
              }, 1000);
            }
          })
          .catch(err => {
            this.submitting = false;
            setFiledsWithErrors(this.form, err);
          });
      }
    });
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
