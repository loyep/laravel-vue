<template>
  <div>
    <a-row :gutter="{ md: 24 }">
      <a-col :md="16" :sm="24">
        <a-card>
          <a-form :form="form" @submit="handleSubmit">
            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="分类名"
              extra="这将是它在站点上显示的名字。"
            >
              <a-input
                v-decorator="[
                  'name',
                  {rules: [{ required: true, message: '请输入分类名' }]}
                ]"
              />
            </a-form-item>

            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="别名"
              extra="“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。"
            >
              <a-input v-decorator="[
                  'slug',
                ]"/>
            </a-form-item>

            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="描述"
              extra="标签描述"
            >
              <a-input
                v-decorator="[
                  'description',
                ]"
                type="textarea"
                :autosize="{ minRows: 3, maxRows: 6 }"
              />
            </a-form-item>

            <a-form-item
              :wrapperCol="{
                xs: { span: 24, offset: 0 },
                sm: { span: 12, offset: 4 },
              }"
            >
              <a-button type="primary" html-type="submit">{{ this.id ? '编辑' : '创建' }}</a-button>
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
import { update, show, store } from "@/api/category";
import { setFiledsWithErrors } from "@/utils/form";

export default {
  name: "CategoryUpdate",
  components: {
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag
  },
  props: {
    id: {
      type: [Number, String],
      required: true
    }
  },
  data() {
    return {
      form: undefined,
      data: {}
    };
  },

  beforeCreate() {
    this.form = this.$form.createForm(this);
  },

  created() {
    this.loadInfo();
  },
  methods: {
    loadInfo() {
      if (this.id) {
        this.$nextTick(() => {
          show(this.id).then(res => {
            const { data } = res.data;
            this.data = data;
            const fields = this.form.getFieldsValue();
            for (let field in fields) {
              if (data.hasOwnProperty(field)) {
                fields[field] = data[field];
              }
            }
            this.form.setFieldsValue(fields);
          });
        });
      }
    },
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFields((err, values) => {
        if (!err) {
          let updateOrCreate;

          if (this.id) {
            updateOrCreate = update(this.id, values);
          } else {
            updateOrCreate = store(values);
          }

          updateOrCreate.then(res => {
            const data = res.data;

            if (data.errors) {
              setFiledsWithErrors(this.form, data.errors);
            } else {
              this.$notification.success({
                message: "提示",
                description: res.data.message
              });
              this.$router.push({
                name: "category.index"
              });
            }
          });
        }
      });
    }
  }
};
</script>
