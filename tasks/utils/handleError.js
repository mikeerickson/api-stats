/*global require, module */

var notify = require('gulp-notify');
const core = require('cd-core');

module.exports = function () {
	var args = Array.prototype.slice.call(arguments);

	// Send error to notification center with gulp-notify
	notify.onError({
		title:   'Compile Error',
		message: '<%= error %>',
		icon:    core.getFailIcon()
	}).apply(this, args);

	// Keep gulp from hanging on this task
	this.emit('end');
};
