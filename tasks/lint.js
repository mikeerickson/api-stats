/* global require*/

const gulp     = require('gulp');
const eslint   = require('gulp-eslint');
const config   = require('./gulp.config');
const sassLint = require('gulp-sass-lint');

const files = config.scripts.client;

gulp.task('lint:scripts', () => {
	gulp.src(files)
		.pipe(eslint())
		.pipe(eslint.format());
});

gulp.task('lint:sass', () => {
	return gulp.src('./resources/assets/sass/**/*.s+(a|c)ss')
		.pipe(sassLint())
		.pipe(sassLint.format())
		.pipe(sassLint.failOnError());
});

gulp.task('lint',['lint:scripts','lint:styles']);