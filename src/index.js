/*global require */

const pkgInfo   = require('../package.json');
const messenger = require('cd-messenger');
const endpoint  = require('./endpoint');

messenger.success('=== ' + pkgInfo.name + ' v' + pkgInfo.version + ' ===');

endpoint.init();
