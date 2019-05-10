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

let config = {
  plugins: [
    new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
    new cleanWebpackPlugin({
      cleanOnceBeforeBuildPatterns: [
        path.resolve(__dirname + '/public/{css,chunk,js}/*')
      ],
      verbose: true,
      exclude: ['index.php', 'svg/', 'favicon.ico']
    })
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/src'),
      '@assets': path.resolve(__dirname, 'resources/src/assets'),
      '@comp': path.resolve(__dirname, 'resources/src/components'),
      '@views': path.resolve(__dirname, 'resources/src/views'),
      '@layout': path.resolve(__dirname, 'resources/src/layout'),
      '@static': path.resolve(__dirname, 'resources/src/static'),
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
};

if (!process.argv.includes('--hot')) {
  config = Object.assign(config, {
    output: {
      chunkFilename: "chunk/[name].js"
    }
  })
}

mix.webpackConfig(config)

mix.babelConfig({
  presets: [
    '@vue/app',
    [
      '@babel/preset-env',
      {
        'useBuiltIns': 'entry'
      }
    ]
  ],
  plugins: [
    "syntax-dynamic-import"
  ]
});

mix
  .options({
    extractVueStyle: true,
  })
  .js('resources/js/app.js', 'public/static/js')
  .sass('resources/sass/app.scss', 'public/static/css')
  .js('resources/src/main.js', 'public/static/js')
  // .sass('resources/src/styles/styles.scss', 'public/static/css')
  .extract([
    'bootstrap',
    'vue',
    'axios',
    'jquery',
  ])
  .version();
