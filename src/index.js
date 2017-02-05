/*global require, module*/

const pkgInfo = require('../package.json');

const app = {
	name: () => {
		return pkgInfo.name;
	},
	version: () => {
		return pkgInfo.version;
	}
}

module.exports = app;