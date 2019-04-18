module.exports = {
  chainWebpack: config => {
    config.plugins.delete('preload')
    config.plugins.delete('prefetch')
  },
  outputDir: '../../public/static',
  publicPath: '/static',
  indexPath: process.env.NODE_ENV === 'production'
    ? '../../../resources/views/prism.blade.php'
    : 'index.html'
}
