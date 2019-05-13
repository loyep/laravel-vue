const mix = require('laravel-mix');

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

mix.webpackConfig({
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/prism/js'),
      '$': path.resolve(__dirname, 'resources/js')
    }
  },
  module: {
    rules: [
      {
        test: /\.less$/,
        loader: require.resolve('less-loader'), // compiles Less to CSS
        options: {
          javascriptEnabled: true
        }
      }
    ],
  }
});

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .js('resources/prism/js/app.js', 'public/js/prism.js')
   .less('resources/prism/less/app.less', 'public/css/prism.css')
   .extract([
     'jquery',
     'vue'
   ]).version();
