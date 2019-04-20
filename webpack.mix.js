const mix = require('laravel-mix')

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
.options({
  extractVueStyle: true,
})
  .setResourceRoot('/app/')
  .setPublicPath('public/app/')
  .js('resources/js/app.js', 'public/app/js')
  .sass('resources/sass/app.scss', 'public/app/css')
  .extract([
    'bootstrap',
    'vue',
    'axios',
    'jquery',
  ])
  .version();
