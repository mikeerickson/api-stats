/*global require*/

const gulp   = require('gulp');
const msg    = require('gulp-messenger');
const config = require('../config');
const chalk  = require('chalk');

const scriptFiles = config.scripts.client;
const sassFiles   = config.scripts.sass;
const phpFiles    = config.scripts.php;

gulp.task('watch:scripts', ['build:scripts'], () => {
	msg.note(`==> Watching Script Files (${scriptFiles})`);
	gulp.watch(scriptFiles, ['build:scripts']);
});

gulp.task('watch:php', ['lint:php'], () => {
  msg.note(`==> Watching PHP Files (${phpFiles})`);
  gulp.watch(phpFiles, ['lint:php']);
});

gulp.task('watch:styles', ['lint:sass', 'build:styles'], () => {
	msg.note(`==> Watching Style Files (${sassFiles})`);
	gulp.watch(sassFiles, ['lint:sass', 'build:styles']);
});

gulp.task('watch:lint:scripts', ['lint:scripts'], () => {
	msg.note(`==> Watching Script Lint Files (${scriptFiles})`);
	gulp.watch(scriptFiles, ['lint:scripts']);
});

gulp.task('watch:lint:sass', ['lint:sass'], () => {
	msg.note(`==> Watching Sass Linting Files (${sassFiles})`);
	gulp.watch(sassFiles, ['lint:sass']);
});

gulp.task('watch:test:server', ['test:server'], () => {
	msg.note(`==> Watching Server API Files (${config.scripts.server})`);
	gulp.watch(config.scripts.server, ['test:server']);
});

gulp.task('watch:test:client', ['test:client'], () => {
	msg.note(`==> Watching Client Files (${config.scripts.client})`);
	gulp.watch(config.scripts.client, ['test:client']);
});

gulp.task('watch:test:api', ['test:api'], () => {
  msg.note(`==> Watching API Files (${config.scripts.server})`);
  gulp.watch(config.scripts.server, ['test:api']);
});

gulp.task('watch',[
	'watch:scripts',
	'watch:styles',
	'watch:lint:scripts',
	'watch:lint:sass'
]);

gulp.task('watch:lint', ['watch:lint:sass','watch:lint:scripts']);
