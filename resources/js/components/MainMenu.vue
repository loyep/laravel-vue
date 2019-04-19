<template>
  <header class="header">
    <nav :class="{
        'fixed-top': fixed,
        'scroll': scroll,
    }">
      <slot/>
    </nav>
  </header>
</template>

<script>
export default {
  created() {
    // this.$nextTick(() => {
    window.addEventListener("scroll", this.handleScroll, true);
    // });
    console.log("Component mounted.");
    // $(".main-menu li:has(>ul)").addClass("has-children");
    // if ($(".main-menu li").hasClass("has-children")){
    //     $(".main-menu li.has-children>a").prepend('<span class="sub-menu-icon text-xs iconfont icon-sub-menu"></span>')
    // };
    // $(window).on('scroll', function() {
    // 	var b = $(window).scrollTop();
    // 	if( b > 72 ){
    // 		$(".fixed-top").addClass("scroll");
    // 	} else {
    // 		$(".fixed-top").removeClass("scroll");
    // 	}
    // });
  },
  data() {
    return {
      fixed: true,
      scroll: true
    };
  },
  methods: {
    handleScroll() {
      const scroll = $(window).scrollTop();

      if (scroll > 72) {
        this.scroll = true;
      } else {
        this.scroll = false;
      }
    }
  }
};
</script>
