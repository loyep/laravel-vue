<template>
  <div class="search-link" @click.stop="handleSearch">
    <slot />
    <el-dialog v-model="visible" width="670px" :footerHide="true" className="vertical-center-modal">
      <div class="search-popup-cover bg-dark px-3 px-lg-5 py-5">
        <div
          class="bg-effect bg-cover nc-no-lazy"
          style="background-image: url('#')"
        >
          <span class="overlay" />
        </div>
        <el-form
          id="searchform"
          role="search"
          class="search-popup-form py-lg-5"
          method="get"
        >
          <el-input
            id="s"
            type="text"
            placeholder="请输入搜索关键词并按回车键…"
            name="s"
            required
          />
        </el-form>
      </div>
      <div class="search-key-push px-3 px-lg-5 py-3 py-lg-4">
        <div class="h6 mb-3">
          热门搜索
        </div>
      </div>
    </el-dialog>
  </div>
</template>

<script>
    export default {
        name: 'LikeLink',
        data () {
            return {
                visible: false
            };
        },
        methods: {
            handleSearch () {
                this.visible = true;
            }
        }
    };
</script>

<style lang="scss" scoped>
.search-link {
  cursor: pointer;
}
</style>

<style lang="scss">
.vertical-center-modal {
  display: flex;
  align-items: center;
  justify-content: center;
  .ivu-modal-body {
    padding: 0;
  }
  .ivu-modal {
    top: 0;
  }
}
</style>
