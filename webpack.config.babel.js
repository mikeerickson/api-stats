/*global require, module, process, __dirname*/

import path from 'path';
import WebpackShellPlugin from '@slightlytyler/webpack-shell-plugin';
import WatchIgnorePlugin from 'watch-ignore-webpack-plugin'
const isProd  = (process.env.ENV === 'production') || (process.env.NODE_ENV === 'production');
const isDev   = !isProd;

const webpackConfig = {
	entry: path.join(__dirname,'src','index.js'),
	output: {
		path: './public/js',
		filename: 'bundle.js'
	},
	module: {
		rules: [
			{test: /(\.scss|\.sass)$/, loaders: ['style-loader','css-loader', 'sass-loader'], exclude: /(node_modules)/},
			{test: /(\.jsx|\.js)$/, loaders: ['babel-loader', 'eslint-loader'], exclude: /(node_modules)/}
		]
	},
	plugins: []
}

if (isDev) {
	// webpackConfig.devtool = 'source-map';
	console.log(path.join(__dirname, 'app/**/*.php'));
	webpackConfig.plugins.push(new WatchIgnorePlugin([
		path.join(__dirname, 'package.json'),
		path.join(__dirname, 'app/**/*.php'),
	])),
	webpackConfig.plugins.push(new WebpackShellPlugin({
		onBuildStart: ['bash ./scripts/bump.sh'], // need to bump version first before files copied etc
		onBuildExit: []
	}));
}

module.exports = webpackConfig;