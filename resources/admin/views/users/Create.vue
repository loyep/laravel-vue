<template>
  <div>
    <a-row :gutter="{ md: 24 }">
      <a-col :md="16" :sm="24">
        <a-card>
          <a-form :form="form" @submit="handleSubmit">
            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="用户名"
              extra="此用户名将作为用户登录时所用的名称. 请不要与系统中现有的用户名重复."
            >
              <a-input
                v-decorator="[
                  'name',
                  {rules: [{ required: true, message: '请输入用户名' }]}
                ]"
                placeholder="请输入用户名"
              />
            </a-form-item>

            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="邮箱"
              extra="电子邮箱地址将作为此用户的主要联系方式.请不要与系统中现有的电子邮箱地址重复."
            >
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

            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="昵称"
              extra="用户昵称可以与用户名不同, 用于前台显示.如果你将此项留空, 将默认使用用户名."
            >
              <a-input
                v-decorator="[
                  'display_name',
                ]"
                placeholder="请输入昵称"
              />
            </a-form-item>

            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="个人网址"
              extra="此用户的个人主页地址, 请用 http:// 开头."
            >
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

            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="密码"
              extra="为此用户分配一个密码.建议使用特殊字符与字母、数字的混编样式,以增加系统安全性."
            >
              <a-input
                type="password"
                v-decorator="[
                  'password',
                  {rules: [{ required: true, message: '请输入密码' }]}
                ]"
                placeholder="请输入密码"
              />
            </a-form-item>

            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="确认密码"
              extra="请确认你的密码, 与上面输入的密码保持一致."
            >
              <a-input
                type="password"
                v-decorator="[
                  'password_confirmation',
                  {rules: [{ required: true, message: '请输入确认密码' }]}
                ]"
                placeholder="请输入确认密码"
              />
            </a-form-item>

            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="用户角色"
              extra="不同的用户组拥有不同的权限."
            >
              <a-select
                v-decorator="[
                  'role',
                  {
                    initialValue: 'admin'
                  }
                ]"
              >
                <a-select-option value="visitor">访问者</a-select-option>
                <a-select-option value="editor">编辑</a-select-option>
                <a-select-option value="admin">管理员</a-select-option>
              </a-select>
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

<script>
import { Card, Col, Row, Tag } from "ant-design-vue";
import { store } from "@/api/user";
import { setFiledsWithErrors } from "@/utils/form";

export default {
  name: "UserUpdate",
  components: {
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag
  },
  data() {
    return {
      form: undefined
    };
  },
  beforeCreate() {
    this.form = this.$form.createForm(this);
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFields((err, values) => {
        if (!err) {
          store(values).then(res => {
            const data = res.data;

            if (data.errors) {
              setFiledsWithErrors(this.form, data.errors);
            } else {
              this.$confirm({
                title: data.message,
                okText: "确认",
                cancelText: "取消",
                onOk: () => {
                  this.$router.push({
                    name: "user.index"
                  });
                }
              });
            }
          });
        }
      });
    }
  }
};
</script>
