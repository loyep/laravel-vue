<template>
  <div :style="{ paddingTop: 100, textAlign: 'center' }">
    <a-spin size="large" />
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component
export default class PageLoading extends Vue {
}
</script>
