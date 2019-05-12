const mix = require('laravel-mix')
const cleanWebpackPlugin = require('clean-webpack-plugin');
const webpack = require('webpack');
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
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/prism'),
      '@assets': path.resolve(__dirname, 'resources/prism/assets'),
      '@comp': path.resolve(__dirname, 'resources/prism/components'),
      '@views': path.resolve(__dirname, 'resources/prism/views'),
      '@layout': path.resolve(__dirname, 'resources/prism/layout'),
      '@static': path.resolve(__dirname, 'resources/prism/static'),
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
  },
});

mix.babelConfig({
  presets: [
    '@vue/app',
    [
      '@babel/preset-env',
      {
        'useBuiltIns': 'entry'
      }
    ]
  ]
});

mix
  .extract([
    'bootstrap',
    'vue',
    'axios',
    'jquery',
  ])
  .setPublicPath('public')
  .js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .js('resources/prism/main.js', 'public/js')
  .less('resources/less/dashboard/prism.less', 'public/css')
  .version();
