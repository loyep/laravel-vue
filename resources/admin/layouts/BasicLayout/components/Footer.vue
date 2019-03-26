<template>
  <a-layout-footer :style="{ padding: 0 }">
    <global-footer :links="[
      {
        key: 'github',
        icon: 'github',
        path: 'https://github.com/loyep/prism',
        blankTarget: true
      }
    ]"
    >
      <template v-slot:copyright>
        Copyright <a-icon type="copyright" /> {{ year }} Power By <a href="https://github.com/loyep/prism">
          Prism
        </a>
      </template>
    </global-footer>
  </a-layout-footer>
</template>

<script lang="ts">
import { Layout } from 'ant-design-vue'
const GlobalFooter = () => import('@/components/GlobalFooter/index.vue')
import { Component, Vue } from 'vue-property-decorator';

@Component({
  components: {
    GlobalFooter,
    'ALayoutFooter': Layout.Footer
  }
})
export default class Footer extends Vue {
  
  private year: number = new Date().getFullYear()

}
</script>

<style lang="less" scoped>

</style>
