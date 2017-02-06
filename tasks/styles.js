/* global require*/

const gulp   = require('gulp');
const sass   = require('gulp-sass');
const config = require('./gulp.config');
const msg    = require('gulp-messenger');
const chalk  = msg.chalk;

gulp.task('build:styles', () => {
	gulp.src(config.scripts.sass)
		.pipe(sass({
			outputStyle: 'compressed'
		}).on('error', sass.logError))
		.pipe(gulp.dest(`${config.output.path}/css`))
		.pipe(msg.flush.info(chalk.green.bold(config.icon.pass) + ' CSS File Created Successfully'));
});

gulp.task('styles',['build:styles']);
gulp.task('build:css',['build:styles']);