/* global require*/

const gulp   = require('gulp');
const sass   = require('gulp-sass');
const config = require('../config');
const msg    = require('gulp-messenger');
const chalk  = require('chalk');
const notify = require('gulp-notify');
const core   = require('cd-core');

gulp.task('build:styles', () => {
	gulp.src(config.scripts.sass)
		.pipe(sass({
			outputStyle: 'compressed'
		}).on('error', sass.logError))
		.pipe(gulp.dest(`${config.output.path}/css`))
		.pipe(notify({
			title: 'Sass/Styles Build',
			message: `${config.output.path}/css/app.js Created Successfully`,
			icon: core.getPassIcon(),
			sound: true
		}))
		.pipe(msg.flush.info(chalk.green.bold(config.icon.pass) + ' CSS File Created Successfully'));
});

gulp.task('styles',['build:styles']);
gulp.task('build:css',['build:styles']);