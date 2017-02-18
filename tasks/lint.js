/* global require*/

const gulp     = require('gulp');
const eslint   = require('gulp-eslint');
const config   = require('../config');
const sassLint = require('gulp-sass-lint');
const phplint  = require('gulp-phplint');
const core     = require('cd-core');
const execa    = require('execa');
const chalk    = require('chalk');

const NotificationCenter = require('node-notifier').NotificationCenter;

let files    = config.scripts.client;

gulp.task('lint:scripts', () => {
	return gulp.src(files)
		.pipe(eslint())
		.pipe(eslint.format());
});

gulp.task('lint:sass', () => {
	return gulp.src('./resources/assets/sass/**/*.s+(a|c)ss')
		.pipe(sassLint())
		.pipe(sassLint.format())
		.pipe(sassLint.failOnError());
});

gulp.task('lint:php', () => {

  execa('bash', ['./scripts/lint-php.sh'],{stdio: 'inherit'})
    .then((result) => {
    })
    .catch((err) => {
    });

  var notifier = new NotificationCenter();
  notifier.notify({
    title:   'PHP Linting',
    message: 'PHP Linting Complete',
    sound:   true,
    icon:    core.getInfoIcon(),
  });

});

gulp.task('lint',['lint:scripts','lint:styles']);
