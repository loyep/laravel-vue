<template>
  <a-layout-header
    v-show="visible"
    :style="{ 'padding': 0, 'width': getHeadWidth }"
    :class="{ 'fixedHeader': fixedHeader }"
  >
    <top-nav-header v-if="isTopMenu && !isMobile" :menus="menus" :collapsed="collapsed"/>
    <global-header v-else :collapsed="collapsed" @collapse="collapse"/>
  </a-layout-header>
</template>

<script lang="ts">
import { Layout } from "ant-design-vue";
const TopNavHeader = () =>  import("@/components/TopNavHeader/index.vue");
const GlobalHeader = () =>  import("@/components/GlobalHeader/index.vue");
// import TopNavHeader from "@/components/TopNavHeader/index.vue";
// import GlobalHeader from "@/components/GlobalHeader/index.vue";
import { Component, Vue, Prop } from "vue-property-decorator";
import { namespace } from "vuex-class";

const themeModule = namespace("theme");

@Component({
  components: {
    TopNavHeader,
    GlobalHeader,
    ALayoutHeader: Layout.Header
  }
})
export default class Header extends Vue {
  @Prop()
  collapsed: boolean;

  @Prop()
  menus: Array<any>;

  @themeModule.Getter("fixedHeader")
  private fixedHeader: boolean;

  @themeModule.Getter("isTopMenu")
  private isTopMenu: boolean;

  @themeModule.Getter("isMobile")
  private isMobile: boolean;

  @themeModule.Getter("autoHideHeader")
  private autoHideHeader: boolean;

  private oldScrollTop: number = 0;
  private ticking: boolean = false;
  private visible: boolean = true;

  get getHeadWidth() {
    if (this.isMobile || !this.fixedHeader || this.isTopMenu) {
      return "100%";
    }
    return this.collapsed ? "calc(100% - 80px)" : "calc(100% - 256px)";
  }

  beforeDestroy() {
    document.removeEventListener("scroll", this.handScroll);
  }

  mounted() {
    document.addEventListener("scroll", this.handScroll, { passive: true });
  }

  handScroll() {
    if (this.autoHideHeader) {
      var that = this;
      const scrollTop =
        document.body.scrollTop + document.documentElement.scrollTop;
      const visible = this.visible;
      const numSlideFun = () => {
        if (that.oldScrollTop > scrollTop) {
          that.visible = true;
        } else if (scrollTop > 300 && visible) {
          that.visible = false;
        } else if (scrollTop < 300 && !visible) {
          that.visible = true;
        }
        that.oldScrollTop = scrollTop;
        requestAnimationFrame(numSlideFun);
      };
      numSlideFun();
    }
  }

  toggle() {
    this.collapse(!this.collapsed);
  }

  collapse(collapsed) {
    this.$emit("collapse", collapsed);
  }
}
</script>

<style lang="less" scoped>
.fixedHeader {
  position: fixed;
  top: 0;
  right: 0;
  z-index: 9;
  width: 100%;
  // transition: width 0.1s;
}
</style>
