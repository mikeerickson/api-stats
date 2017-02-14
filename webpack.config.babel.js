/*global require, module, process, __dirname*/

import path   from 'path';
import core   from 'cd-core';
import config from './config';

import WebpackShellPlugin    from '@slightlytyler/webpack-shell-plugin';
import WatchIgnorePlugin     from 'watch-ignore-webpack-plugin';
import WebpackNotifierPlugin from 'webpack-notifier';

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
	plugins: [
		new WebpackNotifierPlugin({
			title:   'Bundle Scripts',
			icon:    core.getPassIcon(),
			sound:   true,
			message: `${config.output.scriptPath}/bundle.js Created Successfully`
		}),
	]
}

if (isDev) {
	// webpackConfig.devtool = 'source-map';
	webpackConfig.plugins.push(new WatchIgnorePlugin([
		path.join(__dirname, 'package.json'),
		path.join(__dirname, 'app/**/*.php'),
		path.join(__dirname, 'tasks/**/*.js'),
		path.join(__dirname, 'specs/**/*.spec.js'),
		path.join(__dirname, 'sandbox/**/*'),
	])),
	webpackConfig.plugins.push(new WebpackShellPlugin({
		onBuildStart: ['bash ./scripts/bump.sh'],  // need to bump version first before files copied etc
		onBuildExit: []
	}));
}

module.exports = webpackConfig;