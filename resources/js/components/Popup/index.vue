<template>
  <div>
    <button @click="ff"></button>
    <div class="nice-tips ${size} nice-tips-open">
      <div class="nice-tips-overlay" ${maskStyle}></div>
      <div class="nice-tips-body">
        <div class="nice-tips-content">${html}</div>
        <div class="btn-close-tips">
          <svg
            t="1553064665406"
            class="icon w-32"
            style
            viewBox="0 0 1024 1024"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            p-id="3368"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            width="200"
            height="200"
          >
            <defs>
              <style type="text/css"></style>
            </defs>
            <path
              d="M512 12C235.9 12 12 235.9 12 512s223.9 500 500 500 500-223.9 500-500S788.1 12 512 12z m166.3 609.7c15.6 15.6 15.6 40.9 0 56.6-7.8 7.8-18 11.7-28.3 11.7s-20.5-3.9-28.3-11.7L512 568.6 402.3 678.3c-7.8 7.8-18 11.7-28.3 11.7s-20.5-3.9-28.3-11.7c-15.6-15.6-15.6-40.9 0-56.6L455.4 512 345.7 402.3c-15.6-15.6-15.6-40.9 0-56.6 15.6-15.6 40.9-15.6 56.6 0L512 455.4l109.7-109.7c15.6-15.6 40.9-15.6 56.6 0 15.6 15.6 15.6 40.9 0 56.6L568.6 512l109.7 109.7z"
              p-id="3369"
            ></path>
          </svg>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Popup"
};
</script>


