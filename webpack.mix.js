const mix = require('laravel-mix');
const webpack = require('webpack');
const LiveReloadPlugin = require('webpack-livereload-plugin');
const cleanWebpackPlugin = require('clean-webpack-plugin');
const path = require('path');

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
  plugins: [
    new cleanWebpackPlugin({
      cleanOnceBeforeBuildPatterns: [
        path.resolve(__dirname + '/public/{css,chunk,js}/*')
      ],
      verbose: true
    }),
    new LiveReloadPlugin(),
    new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/prism/js'),
      '$': path.resolve(__dirname, 'resources/js')
    }
  }
});

mix
  .options({
    extractVueStyle: true,
    autoprefixer: {
      options: {
        browsers: [
          'last 6 versions',
        ],
      },
    },
  });

mix
  .js('resources/js/app.js', 'public/js/app.js')
  .sass('resources/sass/app.scss', 'public/css/app.css')
  .js('resources/prism/js/app.js', 'public/js/prism.js')
  .sass('resources/prism/sass/app.scss', 'public/css/prism.css')
  .extract(['vue'])
  .version()
  .disableSuccessNotifications();
