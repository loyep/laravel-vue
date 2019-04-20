<template>
  <span class="back-to-top" @click="scrollTop" :class="{
        'active': active
    }">
    <slot />
  </span>
</template>

<script>
export default {
  data() {
    return {
      active: true
    };
  },
  mounted() {
    this.$nextTick(() => {
      window.addEventListener("scroll", this.handleScroll, true);
    });
    this.handleScroll();
  },
  methods: {
    scrollTop() {
      $("html, body")
        .stop()
        .animate(
          {
            scrollTop: 0
          },
          600
        );
    },
    handleScroll() {
      const window_width = $(window).width(),
        window_height = $(window).height(),
        scroll = $(window).scrollTop(),
        startPoint = window_height / 2;

      if (scroll >= startPoint && window_width >= 1024) {
        this.active = true;
      } else {
        this.active = false;
      }

      if (scroll > 72) {
        $(".fixed-top").addClass("scroll");
      } else {
        $(".fixed-top").removeClass("scroll");
      }
    }
  }
};
</script>