<template>
  <div>
    <a-row :gutter="{ md: 24 }">
      <a-col :md="24" :sm="24">
        <a-card :style="{ marginBottom: '16px' }" :title="title">
          <template slot="extra">
            <a-button type="primary" @click="handleSubmit">提交</a-button>
          </template>
        </a-card>
      </a-col>

      <a-col :md="18" :sm="24">
        <a-card>
          <a-form :form="form" @submit="handleSubmit">
            <a-form-item :wrapper-col="{ span: 12 }">
              <a-input
                placeholder="请输入标题"
                v-decorator="[
                  'title',
                  {rules: [{ required: true, message: '请输入标题' }]}
                ]"
              />
            </a-form-item>

            <a-form-item :wrapper-col="{ span: 24 }">
              <editor
                v-decorator="[
                  'content',
                  {
                    initialValue: 'ffffhfjshd',
                    rules: [{ required: true, message: '请输入标题' }]
                  }
                ]"
                placeholder="开始写作"
              />
            </a-form-item>

            <!-- <a-form-item
              :wrapperCol="{
                xs: { span: 24, offset: 0 },
                sm: { span: 12, offset: 4 },
              }"
            >
              <a-button type="primary" html-type="submit">创建</a-button>
            </a-form-item>-->
          </a-form>
        </a-card>
      </a-col>

      <a-col :md="6" :sm="12">
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
import { store } from "@/api/post";
import { setFiledsWithErrors } from "@/utils/form";
import { WrappedFormUtils } from "ant-design-vue/types/form/form";
import { setTimeout } from "timers";
import Editor from "@/components/Editor/index.vue";

@Component({
  components: {
    ACard: Card,
    ACol: Col,
    ARow: Row,
    ATag: Tag,
    Editor: Editor
  }
})
export default class PostCreate extends Vue {
  private form: WrappedFormUtils;

  beforeCreate() {
    this.form = this.$form.createForm(this);
  }

  private title: string = "";

  private content: string = "ffff";

  created() {
    const fields = {
      'content': '222222'
    }
    this.form.setFieldsValue(fields); 
  }

  handleSubmit(e: Event) {
    e.preventDefault();
    this.form.validateFields((err, values) => {
      if (!err) {
        console.log(values);
        return;
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
                  name: "post.index"
                });
              }
            });
          }
        });
      }
    });
  }
}
</script>
