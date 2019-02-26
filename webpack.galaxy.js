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

mix
  .setPublicPath('public/assets/admin')
   .js('resources/galaxy/main.js', 'public/assets/admin/admin.js')
   // .copy('resources/galaxy/themes', 'public/assets/admin/css/themes')
   .sourceMaps()

if (mix.inProduction()) {
  mix.version()
  mix.disableNotifications()
}

mix.webpackConfig({
  plugins: [
    new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
  ],
  resolve: {
    extensions: ['.js', '.jsx', '.json', '.vue'],
    alias: {
      '@': path.resolve(__dirname, 'resources/galaxy'),
      '~': path.resolve(__dirname, 'resources/js/app')
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
          modifyVars: {
            /*
             'primary-color': '#F5222D',
             'link-color': '#F5222D',
             'border-radius-base': '4px',
             */
          },
          javascriptEnabled: true
        }
      }
    ]
  },
  output: {
    chunkFilename: 'js/[name].[chunkhash].js',
    publicPath: mix.config.hmr ? '//localhost:8080' : '/'
  }
})

