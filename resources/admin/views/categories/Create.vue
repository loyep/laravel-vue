<template>
  <a-card>
    <a-form :form="form" @submit="handleSubmit"></a-form>
  </a-card>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import { Card, Col, Row } from "ant-design-vue";

@Component({
  components: {
    ACard: Card,
    ACol: Col,
    ARow: Row
  }
})
export default class CategoryCreate extends Vue {
  private form: any;

  beforeCreate() {
    this.form = this.$form.createForm(this);
  }

  handleSubmit(e: Event) {
    e.preventDefault();
    this.form.validateFields((err, values) => {
      if (!err) {
        //
      }
    });
  }
}
</script>
