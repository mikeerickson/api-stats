/* global require*/

const gulp   = require('gulp');
const eslint = require('gulp-eslint');
const config = require('./gulp.config');

const files = ['./tasks/**/*.js', './src/**/*.js', 'gulpfile.js', '!node_modules/**'];

gulp.task('lint', () => {
	gulp.src(files)
		.pipe(eslint())
		.pipe(eslint.format());
});
