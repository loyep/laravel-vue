const webpack = require('webpack')
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

const config = {
  plugins: [
    new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
  ],
  resolve: {
    extensions: ['.js', '.jsx', '.json', '.vue'],
    alias: {
      '@': path.resolve(__dirname, 'resources/admin')
    },
    modules: [
      'node_modules'
    ]
  },
  module: {
    rules: [
      {
        test: /\.less$/,
        loader: 'less-loader',
        options: {
          javascriptEnabled: true
        }
      }
    ]
  },
  output: {
    chunkFilename: 'js/[name].[chunkhash].js',
    publicPath: '/static/admin/'
  }
}

mix
  .setResourceRoot('/static/admin')
  .setPublicPath('public/static/admin')
  .js('resources/admin/main.js', 'public/static/admin/admin.js')
  .less('resources/admin/styles/index.less', 'public/static/admin/admin.css')
  .copyDirectory('resources/admin/themes', 'public/static/admin/themes')
  .version()

if (mix.inProduction()) {
  mix.disableNotifications()
} else {
  mix.sourceMaps()
}

mix.webpackConfig(config)
