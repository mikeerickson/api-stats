/* global require*/

const gulp   = require('gulp');
const msg    = require('gulp-messenger');
const config = require('./gulp.config');
const chalk  = msg.chalk;
const browserify = require('gulp-browserify');
const rename = require('gulp-rename');
const execa = require('execa');
const scriptFiles = config.scripts.client;
const exec = require('gulp-exec');
gulp.task('build:scripts', () => {

	gulp.src(config.entry.filename)
		.pipe(exec('bash ./scripts/bump.sh'))
		.pipe(browserify({
			insertGlobals : true,
			debug : true
		}))
		.pipe(rename(config.output.filename))
		.pipe(gulp.dest(`${config.output.path}/js`))
		.pipe(msg.flush.success(chalk.green.bold(config.icon.pass) + ' Bundle Created Successfully'));

});
