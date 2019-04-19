<template>
  <div>
    <a
      href="#"
      @click="scrollTop"
      :class="{
        'back-to-top': true,
        'active': active
    }"
    >
      <span class="icon-stack">
        <i class="text-xs iconfont icon-up"></i>
        <span class="back-to-top-text">Top</span>
      </span>
    </a>
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: true
    };
  },
  mounted() {
    console.log("Component mounted.");
    // var $window           = $(window),
    // 	$window_width     = $window.width(),
    // 	$window_height    = $window.height(),
    // 	scroll            = $window.scrollTop(),
    //     startPoint        = $window_height / 2,
    //     scrTopBtn         = $("#nice-back-to-top");
    // if ( scroll >= startPoint && $window_width >= 1024  ) {
    //     scrTopBtn.addClass('active');
    // } else {
    //     scrTopBtn.removeClass('active');
    // }
    // scrTopBtn.on("click", function () {
    //     $("html, body").stop().animate({
    //         scrollTop: 0
    //     },
    //     600);
    // });
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