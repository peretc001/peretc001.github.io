
var ImageminPlugin = require('imagemin-webpack-plugin').default

module.exports = {
  plugins: [
    new ImageminPlugin({
      test: /\.(jpe?g|png|gif|svg)$/i
    })
  ]
};
