<template>
  <div>
    <div class="ajax-loading" v-show="loading">
      <span class="dot1"></span>
      <span class="dot2"></span>
    </div>
    <button
      :disabled="noMore"
      :class="[ buttonClasses, { loading: loading } ]"
      v-show="!loading"
      @click="loadMore"
    >{{ buttonText }}</button>
  </div>
</template>

<script>
import axios from "axios";
import { addViewportEvent } from '../../utils/scroll';
export default {
  name: "LoadMore",
  props: {
    text: {
      type: String,
      default: "Load more..."
    },
    endText: {
      type: String,
      default: "没有更多"
    }
  },
  data() {
    return {
      loading: false,
      active: false,
      page: undefined,
      noMore: false,
      url: undefined,
      param: {},
      buttonClasses: "dposts-ajax-load btn btn-light btn-block"
    };
  },
  computed: {
    buttonText() {
      return this.noMore ? this.endText : this.text;
    }
  },
  mounted() {
    this.parseQuery();
    const that = this;
    addViewportEvent(this.$el, function() {
      if (!that.loading && !that.noMore) {
        if (that.page <= 3) {
          that.loadMore();
        }
      }
    });
  },
  methods: {
    parseQuery() {
      let url = window.location.href;
      const param = {};
      const arr = url.substr(url.indexOf("?") + 1).split("&");
      arr.forEach(item => {
        const tmp = item.split("=");
        param[tmp[0]] = tmp[1];
      });
      this.param = param;
      this.page = param.page || 1;

      if (url.indexOf("?") !== -1) {
        url = url.split("?")[0];
      }
      this.url = url;
    },
    loadMore() {
      const param = Object.assign({}, this.param);
      param.page = this.page + 1;
      this.loading = true;
      axios
        .post(this.url, param)
        .then(res => {
          const data = res.data;
          if (data.trim()) {
            this.page += 1;
            $("#articles").append(data);
          } else {
            this.noMore = true;
          }
          this.loading = false;
        })
        .catch(error => {
          this.loading = false;
        });
    }
  }
};
</script>

<style lang="less" scoped>
</style>
