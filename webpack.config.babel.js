/*global require, module, process, __dirname*/

import path   from 'path';
import core   from 'cd-core';
import config from './config';

import WebpackShellPlugin    from '@slightlytyler/webpack-shell-plugin';
import WatchIgnorePlugin     from 'watch-ignore-webpack-plugin';
import WebpackNotifierPlugin from 'webpack-notifier';
import BrowserSyncPlugin     from 'browser-sync-webpack-plugin';

const isProd  = (process.env.ENV === 'production') || (process.env.NODE_ENV === 'production');
const isDev   = !isProd;

const webpackConfig = {
	entry: path.join(__dirname,'src','js','index.js'),  // use config
	output: {
		path: './public/js',
		filename: 'bundle.js'
	},
	module: {
		rules: [
			{test: /(\.scss|\.sass)$/, loaders: ['style-loader','css-loader', 'sass-loader'], exclude: /(node_modules)/},
			{test: /(\.jsx|\.js)$/, loaders: ['babel-loader', 'eslint-loader'], exclude: /(node_modules)/},
			{test: /\.woff($|\?)|\.woff2($|\?)|\.ttf($|\?)|\.eot($|\?)|\.svg($|\?)/, loaders: ['url-loader']},
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: {
            // Since sass-loader (weirdly) has SCSS as its default parse mode, we map
            // the "scss" and "sass" values for the lang attribute to the right configs here.
            // other preprocessors should work out of the box, no loader config like this necessary.
            'scss': 'vue-style-loader!css-loader!sass-loader',
            'sass': 'vue-style-loader!css-loader!sass-loader?indentedSyntax'
          }
          // other vue-loader options go here
        }
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        loader: 'file-loader',
        options: {
          name: '[name].[ext]?[hash]'
        }
      }
    ]
	},
	plugins: [
		new WebpackNotifierPlugin({
			title:   'Bundle Scripts',
			icon:    core.getPassIcon(),
			sound:   true,
			message: `${config.output.scriptPath}/bundle.js Created Successfully`
		}),
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 3001,
      proxy: {
        target: 'http://api-stats.home',
        reqHeaders: () => {
          return {
            host: 'localhost:3001'
          };
        }
      },
      files: ['./public/**/*.*','./resources/views/*.php']
    }),
	],
  resolve: {
	  alias: {
	    'vue$': 'vue/dist/vue.common.js'
    }
  }
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
