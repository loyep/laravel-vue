const webpack = require('webpack');

module.exports = {
  filenameHashing: false,
  configureWebpack: {
    plugins: [
      // Ignore all locale files of moment.js
      new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
    ]
  },
  chainWebpack: config => {
    if (process.env.NODE_ENV === 'production') {
      config.plugins.delete('html')
    }
    config.plugins.delete('prefetch')
    config.plugins.delete('preload')
  },
  outputDir: '../../public/static',
  publicPath: process.env.NODE_ENV === 'production' ? '/static' : '',
  devServer: {
    port: 8080,
    proxy: {
      '/api': {
        target: "http://localhost:8000",
        changeOrigin: true,
        ws: true,
        secure: false
      }
    }
  },
}
