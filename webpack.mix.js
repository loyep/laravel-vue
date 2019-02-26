const mix = require('laravel-mix')
const path = require('path')
const argv = require('yargs').argv
const { env } = argv

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

if (env && env.galaxy) {
  return require(path.resolve(__dirname, 'webpack.galaxy.js'))
}

// mix.js('resources/js/app.js', 'public/js')
// .sass('resources/sass/app.scss', 'public/css')
