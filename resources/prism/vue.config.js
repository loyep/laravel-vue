module.exports = {
  chainWebpack: config => {
    config.plugins.delete('preload')
    config.plugins.delete('prefetch')
    config.plugins.delete('pwa')
  },
  outputDir: '../../public/static/admin',
  publicPath: '/static/admin',
  indexPath: process.env.NODE_ENV === 'production'
    ? '../../../resources/views/prism.blade.php'
    : 'index.html'
}
