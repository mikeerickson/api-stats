/*global require*/

const gulp    = require('gulp');
const phpunit = require('gulp-phpunit');
const msg     = require('cd-messenger');
const chalk   = require('chalk');
const config  = require('./gulp.config');
const execa   = require('execa');
const mocha   = require('gulp-mocha');
const args    = require('yargs').argv;

gulp.task('test:server', () => {

	let files = config.scripts.server;

	let options = {
		debug: false,
		statusLine: false,
		testSuite: (args.testClass) ? '' : 'API',
		testClass: (args.testClass) ? args.testClass : '',
	};
	gulp.src(files)
		.pipe(phpunit('./vendor/bin/phpunit', options))
		.on('error', (error) => {
			msg.error(error);
		});

		// bump pre release in package.json
		execa('bash', ['./scripts/bump.sh']).then(result => {
			console.log(chalk.green.bold(result.stdout));
		});
});

gulp.task('test:client', () => {

		let files = config.scripts.client;

		gulp.src(files)
			.pipe(mocha())
		.on('error', (error) => {
			msg.error(error);
		});

		// bump pre release in package.json
		execa('bash', ['./scripts/bump.sh']).then(result => {
			console.log(chalk.green.bold(result.stdout));
		});
});

gulp.task('test:api',['test:server']);