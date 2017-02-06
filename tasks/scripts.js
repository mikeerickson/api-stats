/* global require*/

const gulp   = require('gulp');
const msg    = require('gulp-messenger');
const config = require('./gulp.config');
const chalk  = msg.chalk;

const scriptFiles = config.scripts.client;

gulp.task('build:scripts', () => {
	gulp.src(scriptFiles)
		.pipe(msg.flush.warn(chalk.red.bold(config.icon.fail) + ' Script Processing Here ...'));
});

gulp.task('scripts',['build:scripts']);