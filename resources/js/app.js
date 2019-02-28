
try {
  window.Popper = require('popper.js').default
  window.$ = window.jQuery = require('jquery')
  require('magnific-popup')
  require('owl.carousel')
  require('bootstrap')
} catch (e) {
  console.warn(e)
}
