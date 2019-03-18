<template>
  <div :class="{ 'main': true, wide: wide }">
    <slot />
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { State, Mutation, namespace } from 'vuex-class';

const themeModule = namespace('theme');

@Component
export default class GridContent extends Vue {

  @themeModule.Getter('contentWidth')
  private contentWidth: string;

  get wide() {
    return this.contentWidth === 'Fixed'
  }

}
</script>

<style lang="less" scoped>
.main {
  width: 100%;
  height: 100%;
  min-height: 100%;
  transition: 0.3s;
  &.wide {
    max-width: 1200px;
    margin: 0 auto;
  }
}

</style>
