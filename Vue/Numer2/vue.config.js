module.exports = {
  publicPath: '/',
  css: {
    loaderOptions: {
      sass: {
        data: '@import "@/sass/main.sass";'
      }
    }
  }
  // assetsDir: 'assets'
}
