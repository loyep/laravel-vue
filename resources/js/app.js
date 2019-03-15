
try {
  window.Popper = require('popper.js').default
  window.$ = window.jQuery = require('jquery')
  require('magnific-popup')
  require('smoothscroll-for-websites')
  require('headroom.js')
  require('owl.carousel')
  require('bootstrap')
  require('./nicetheme')
} catch (e) {
  console.warn(e)
}
