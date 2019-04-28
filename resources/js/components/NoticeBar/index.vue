<template>
  <div class="push-notice mb-3 mb-md-4">
    <template v-if="plain">
      <div class="index-notice bg-light">
        <div
          class="notice-content d-flex flex-fill flex-column flex-md-row flex-md-warp align-items-md-center p-3 p-md-4"
        >
          <div class="notice-text">
            <p>{{ content }}</p>
          </div>
          <div class="flex-md-fill"></div>
          <div class="notice-action mx-n1 mx-md-0 pl-md-4 pt-2 pt-md-0">
            <span class="d-inline-block p-1 px-md-0">
              <a :class="buttonClass" :href="link" target="_blank">{{ title }}</a>
            </span>
          </div>
        </div>
      </div>
    </template>
    <template v-else>
      <div class="index-notice image-notice">
        <div class="media">
          <div class="media-content" :style="{ backgroundImage: `url(${bgImage})` }"></div>
        </div>
        <div
          class="notice-content d-flex flex-fill flex-column flex-md-row flex-md-warp align-items-md-center p-3 p-md-4"
        >
          <div class="notice-text">
            <p>{{ content }}</p>
          </div>
          <div class="flex-md-fill"></div>
          <div class="notice-action mx-n1 mx-md-0 pl-md-4 pt-2 pt-md-0">
            <span class="d-inline-block p-1 px-md-0">
              <a :class="buttonClass" :href="link" target="_blank">{{ title }}</a>
            </span>
          </div>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
export default {
  name: "NoticeBar",
  props: {
    bgImage: {
      type: String,
      default: ""
    },
    plain: {
      type: Boolean,
      default: false
    },
    content: {
      type: String,
      default: ""
    },
    link: {
      type: String,
      default: ""
    },
    type: {
      type: String,
      default: "dark"
    },
    title: {
      type: String,
      default: ""
    }
  },
  data() {
    return {};
  },
  computed: {
    buttonClass() {
      return this.type === "dark"
        ? "btn btn-secondary btn-sm"
        : "btn btn-primary btn-sm";
    }
  }
};
</script>

<style lang="less" scoped>
</style>
