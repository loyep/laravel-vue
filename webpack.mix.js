const mix = require('laravel-mix')
const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .setResourceRoot('/static')
  .setPublicPath('public/static')
  .scss('resources/less/app.less', 'public/static')

mix.scripts([
  'resources/js/vendor/jquery.min.js',
  'resources/js/vendor/jquery-migrate.min.js',
  'resources/js/vendor/jquery.magnific-popup.min.js',
  'resources/js/vendor/axios.min.js',
  'resources/js/vendor/owl.carousel.min.js',
  'resources/js/vendor/plugins.min.js',
  'resources/js/vendor/theia-sticky-sidebar.min.js',
  'resources/js/app.js'
], 'public/static/app.js')
