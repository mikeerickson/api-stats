/* global require*/

const gulp   = require('gulp');
const msg    = require('gulp-messenger');
const config = require('./gulp.config');

const files = ['./tasks/**/*.js', './src/**/*.js', 'gulpfile.js', '!node_modules/**'];

gulp.task('scripts', () => {
	gulp.src(files)
		.pipe(msg.flush.warn(config.icon.warn + ' Script Processing Here ...'));
});
