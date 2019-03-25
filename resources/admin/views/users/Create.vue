<template>
  <div>
    <a-row :gutter="{ md: 24 }">
      <a-col :md="16" :sm="24">
        <a-card>
          <a-form :form="form" @submit="handleSubmit">
            <a-form-item :label-col="{ span: 4 }" :wrapper-col="{ span: 12 }" label="用户名">
              <a-input
                v-decorator="[
                  'name',
                  {rules: [{ required: true, message: '请输入用户名' }]}
                ]"
                placeholder="请输入用户名"
              />
            </a-form-item>

            <a-form-item :label-col="{ span: 4 }" :wrapper-col="{ span: 12 }" label="邮箱">
              <a-input
                v-decorator="[
                  'email',
                  {
                    rules: [
                  { required: true, message: '请输入邮箱' },
                  { type: 'email', message: '邮箱格式错误' }
                  ]}
                ]"
                placeholder="请输入邮箱"
              />
            </a-form-item>

            <a-form-item :label-col="{ span: 4 }" :wrapper-col="{ span: 12 }" label="昵称">
              <a-input
                v-decorator="[
                  'display_name',
                ]"
                placeholder="请输入昵称"
              />
            </a-form-item>

            <a-form-item :label-col="{ span: 4 }" :wrapper-col="{ span: 12 }" label="个人网址">
              <a-input
                v-decorator="[
                  'url',
                  {
                    rules: [
                      { type: 'url', message: '个人网址格式错误' }
                    ]
                  }
                ]"
                placeholder="请输入个人网址"
              />
            </a-form-item>

            <a-form-item :label-col="{ span: 4 }" :wrapper-col="{ span: 12 }" label="密码">
              <a-input
                v-decorator="[
                  'password',
                  {rules: [{ required: true, message: '请输入密码' }]}
                ]"
                placeholder="请输入密码"
              />
            </a-form-item>

            <a-form-item :label-col="{ span: 4 }" :wrapper-col="{ span: 12 }" label="确认密码">
              <a-input
                v-decorator="[
                  'password_confirmation',
                  {rules: [{ required: true, message: '请输入确认密码' }]}
                ]"
                placeholder="请输入确认密码"
              />
            </a-form-item>

            <a-form-item
              :wrapperCol="{
                xs: { span: 24, offset: 0 },
                sm: { span: 12, offset: 4 },
              }"
            >
              <a-button type="primary" html-type="submit">创建</a-button>
            </a-form-item>
          </a-form>
        </a-card>
      </a-col>

      <a-col :md="8" :sm="12">
        <a-card>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        </a-card>
      </a-col>
    </a-row>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { Card, Col, Row, Tag } from "ant-design-vue";
import { store } from '@/api/user';
import { setFiledsWithErrors } from '@/utils/form'
import { WrappedFormUtils } from "ant-design-vue/types/form/form";

@Component({
  components: {
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag
  }
})
export default class UserCreate extends Vue {
  private form: WrappedFormUtils;

  beforeCreate() {
    this.form = this.$form.createForm(this);
  }

  handleSubmit(e: Event) {
    e.preventDefault();
    this.form.validateFields((err, values) => {
      if (!err) {
        store(values).then(res => {
          const data = res.data

          if (data.error) {
            setFiledsWithErrors(this.form, data.message)
          }
        })
      }
    });
  }
}
</script>
