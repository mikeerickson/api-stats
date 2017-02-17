/*global module, require */

const core = require('cd-core');

const config = {
	// these icons can be used for console output
	icon: {
		fail: core.cliIconFail,
		pass: core.cliIconPass,
		warn: core.cliIconWarn
	},
	entry: {
		filename: './src/js/index.js'
	},
	scripts: {
		server: ['./**/*.php'],
		client: ['./src/js/**/*.js', './tasks/**/*.js', './specs/**/*.spec.js'],
		sass:   ['./src/sass/**/*.s+(a|c)ss'],
		specs:  ['./specs/**/*.js'],
	},
	output: {
		path:       './public',
		filename:   'bundle.js',
		scriptPath: './public/js',
		stylePath:  './public/css',
	}
};

module.exports = config;
