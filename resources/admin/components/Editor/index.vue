<template>
  <div>
    <mavon-editor
      class="article-editor-content"
      v-model="content"
      placeholder="请开始你的表演..."
    ></mavon-editor>
  </div>
</template>

<script lang="ts">
const mavonEditor = require("mavon-editor");

import "mavon-editor/dist/css/index.css";
import { Component, Vue, Prop } from "vue-property-decorator";

@Component({
  components: {
    mavonEditor: mavonEditor.mavonEditor
  }
})
export default class Editor extends Vue {

  private content: any = ''

}
</script>

