<template>
  <a href="javascript:" ref="likeBtn" :class="likeClass" @click="handleLike">
    <slot/>
    <small class="like-count">{{ likesCount }}</small>
  </a>
</template>

<script>
import axios from "axios";
export default {
  name: "LikeButton",
  props: {
    id: {
      type: [Number, String],
      default: ''
    },
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
      this.$refs.likeBtn.blur();
      axios
        .post(`/post/${this.id}/like`)
        .then(res => {
          const { data } = res.data
          if (data !== undefined) {
            this.$root.Like.$emit("like", data);
          }
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
