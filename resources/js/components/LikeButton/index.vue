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
    count: {
      type: String,
      default: '0'
    },
    value: {
      type: String,
      default: false
    }
  },
  data() {
    const likesCount = this.count;
    const isLike = Boolean(this.value || false);
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
    handleLike(e) {
      e.preventDefault();
      this.$refs.likeBtn.blur();
      axios
        .post(`/article/${this.id}/like`)
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
