/* global require*/

const gulp         = require('gulp');
const msg          = require('gulp-messenger');
const config       = require('./gulp.config');
const chalk        = require('chalk');
const browserify   = require('gulp-browserify');
const rename       = require('gulp-rename');
const exec         = require('gulp-exec');
const notify       = require('gulp-notify');
const handleErrors = require('./utils/handleError');
const core         = require('cd-core');

gulp.task('build:scripts', () => {

	gulp.src(config.entry.filename)
		.pipe(exec('bash ./scripts/bump.sh'))
		.pipe(browserify({
			insertGlobals: false,
			debug: false
		}))
		.on('error', handleErrors)
		.pipe(rename(config.output.filename))
		.pipe(gulp.dest(`${config.output.path}/js`))
		.pipe(notify({
			title: 'Script Build',
			message: `${config.output.path}/js/bundle.js Created Successfully`,
			icon: core.getPassIcon(),
			sound: true
		}));

});

