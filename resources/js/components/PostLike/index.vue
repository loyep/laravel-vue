<template>
  <a href="javascript:;" ref="likeBtn" :class="likeClass" @click="handleLike">
    <slot />
    <small class="like-count">{{ likesCount }}</small>
  </a>
</template>

<script>
export default {
  name: "PostHeaderLike",
  props: {
    likes: {
      type: [Number, String],
      default: 0
    },
    liked: {
      type: [Boolean, String],
      default: false
    }
  },
  data() {
    const likesCount = isNaN(parseInt(this.likes)) ? 0 : parseInt(this.likes);
    const isLike = this.isLike || false;
    return {
      likesCount: likesCount,
      isLike: isLike
    };
  },
  computed: {
    likeClass() {
      return (this.isLike ? "current" : "") + " post-like";
    }
  },
  mounted() {
    this.$root.Like.$on("like", value => {
      this.isLike = value.isLike;
      this.likesCount = value.likesCount;
    });
  },
  methods: {
    handleLike() {
      this.$refs.likeBtn.blur()
      this.$root.Like.$emit("like", {
        isLike: !this.isLike,
        likesCount: this.isLike ? this.likesCount - 1 : this.likesCount + 1
      });
    }
  }
};
</script>
