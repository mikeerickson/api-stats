/*global require*/

const gulp    = require('gulp');
const phpunit = require('gulp-phpunit');
const msg     = require('cd-messenger');
const chalk   = require('chalk');
const config  = require('./gulp.config');
const execa   = require('execa');

const files = config.scripts.server;

gulp.task('test:server', () =>{
	let options = {
		debug: false,
		testSuite: 'API'
	};
	gulp.src(files)
		.pipe(phpunit('./vendor/bin/phpunit', options))
		.on('error', (error) => {
			msg.error(error);
		});

		// bump prerelease in package.json
		execa('bash', ['./scripts/bump.sh']).then(result => {
			console.log(chalk.green.bold(result.stdout));
		});
});

