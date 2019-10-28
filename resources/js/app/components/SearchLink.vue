<template>
  <div class="search-link" @click.stop="handleSearch">
    <slot />
    <Modal v-model="visible" :width="670" :footerHide="true" className="vertical-center-modal">
      <div class="search-popup-cover bg-dark px-3 px-lg-5 py-5">
        <div
          class="bg-effect bg-cover nc-no-lazy"
          style="background-image: url('https://cosy.demo.nicetheme.xyz/wp-content/uploads/2019/06/2019070317160730-e1562174176549.jpg')"
        >
          <span class="overlay" />
        </div>
        <i-form
          id="searchform"
          role="search"
          class="search-popup-form py-lg-5"
          method="get"
        >
          <i-input
            id="s"
            type="text"
            placeholder="请输入搜索关键词并按回车键…"
            name="s"
            required
          />
        </i-form>
      </div>
      <div class="search-key-push px-3 px-lg-5 py-3 py-lg-4">
        <div class="h6 mb-3">
          热门搜索
        </div>
        <ul class="nav nav-pills m-n1">
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/apple"
              target="_blank"
              class="btn btn-light btn-sm"
            >Apple</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/aripods"
              target="_blank"
              class="btn btn-light btn-sm"
            >Aripods</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/cupertino"
              target="_blank"
              class="btn btn-light btn-sm"
            >Cupertino</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e4%ba%9a%e6%b4%b2%e5%b8%82%e5%9c%ba"
              target="_blank"
              class="btn btn-light btn-sm"
            >亚洲市场</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e4%ba%ba%e4%ba%ba%e8%bd%a6"
              target="_blank"
              class="btn btn-light btn-sm"
            >人人车</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e5%8c%ba%e5%9d%97%e9%93%be"
              target="_blank"
              class="btn btn-light btn-sm"
            >区块链</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e5%8d%8e%e4%b8%ba"
              target="_blank"
              class="btn btn-light btn-sm"
            >华为</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e5%90%88%e4%bd%9c%e4%bc%99%e4%bc%b4"
              target="_blank"
              class="btn btn-light btn-sm"
            >合作伙伴</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e5%b7%a8%e5%a4%b4%e4%bc%81%e4%b8%9a"
              target="_blank"
              class="btn btn-light btn-sm"
            >巨头企业</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e7%89%b9%e6%ae%8a%e5%b7%a5%e5%85%b7"
              target="_blank"
              class="btn btn-light btn-sm"
            >特殊工具</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e7%ba%bd%e7%ba%a6%e6%97%b6%e6%8a%a5"
              target="_blank"
              class="btn btn-light btn-sm"
            >纽约时报</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e8%8b%b9%e6%9e%9c"
              target="_blank"
              class="btn btn-light btn-sm"
            >苹果</a>
          </li>
          <li class="nav-item p-1">
            <a
              href="https://cosy.demo.nicetheme.xyz/blog/tag/%e8%b5%84%e9%87%91%e9%93%be"
              target="_blank"
              class="btn btn-light btn-sm"
            >资金链</a>
          </li>
        </ul>
      </div>
    </Modal>
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
