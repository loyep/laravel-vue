<template>
  <div>
    <a-row :gutter="{ md: 24 }">
      <a-col :md="16" :sm="24">
        <a-card>
          <a-form :form="form" @submit="handleSubmit">
            <a-form-item
              :label-col="{ span: 4 }"
              :wrapper-col="{ span: 12 }"
              label="标签名"
              extra="“这将是它在站点上显示的名字。"
            >
              <a-input
                v-decorator="[
                  'name',
                  {rules: [{ required: true, message: '请输入标签名' }]}
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

<script lang="ts">
import { Component, Vue, Prop } from "vue-property-decorator";
import { Card, Col, Row, Tag } from "ant-design-vue";
import { update, show, store } from "@/api/tag";
import { setFiledsWithErrors } from "@/utils/form";
import { WrappedFormUtils } from "ant-design-vue/types/form/form";
import { setTimeout } from "timers";
import { AxiosPromise } from "axios";

@Component({
  components: {
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag
  }
})
export default class TagUpdate extends Vue {
  @Prop({ type: [String, Number] })
  public id: [string, number];

  private form: WrappedFormUtils;

  private data: any = {};

  beforeCreate() {
    this.form = this.$form.createForm(this);
  }

  created() {
    this.loadInfo();
  }

  loadInfo() {
    if (this.id) {
      this.$nextTick(() => {
        show(this.id).then(res => {
          const { data } = res.data;
          this.data = data;
          const fields = (<any>this.form).getFieldsValue();
          for (let field in fields) {
            if (data.hasOwnProperty(field)) {
              fields[field] = data[field];
            }
          }
          this.form.setFieldsValue(fields);
        });
      });
    }
  }

  handleSubmit(e: Event) {
    e.preventDefault();
    this.form.validateFields((err, values) => {
      if (!err) {
        let updateOrCreate: AxiosPromise<any>;

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
              name: "tag.index"
            });
          }
        });
      }
    });
  }
}
</script>
