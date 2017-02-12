/* global require */

var msg    = require('cd-messenger');
var rimraf = require('rimraf');
var fs     = require('fs-extra');

console.log('');

let err = rimraf.sync('./public/css/*.css', {});
if (err) { console.error(err); }
msg.success('./public/css/*.css deleted');

fs.copySync('./src/css/general.css', './public/css/general.css');
msg.success('./src/css/* copied ot ./public/css/*');