/*global require, module*/

const pkgInfo   = require('../package.json');
const messenger = require('cd-messenger');

messenger.info('=== ' + pkgInfo.name + ' v' + pkgInfo.version + ' ===');

// debugger;

const app = {
	name: () => {
		return pkgInfo.name;
	},
	version: () => {
		return pkgInfo.version;
	}
};

module.exports = app;