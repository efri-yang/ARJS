var webpack = require('webpack');
var WebpackDevServer = require('webpack-dev-server');
var config = require('./webpack.config');
process.env.NODE_ENV='production'//NODE_ENV可以来设置环境变量（默认值为development）。 一般我们通过检查这个值来分别对开发环境和生产环境下做不同的处理
new WebpackDevServer(webpack(config), {
  publicPath: '/dist/',
  hot: true,
  historyApiFallback: true
}).listen(3200, 'localhost', function (err, result) {
  if (err) {
    console.log(err);
  }

  console.log('Listening at localhost:3200');
});
