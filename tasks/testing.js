const gulp    = require('gulp');
const phpunit = require('gulp-phpunit');
const msg     = require('gulp-messenger');
const chalk   = require('chalk')
const config  = require('./gulp.config');

const files = config.scripts.server;

gulp.task('test:server', () =>{
	let options = {
		debug: false,
		testSuite: 'API'
	};
	gulp.src(files)
		.pipe(phpunit('./vendor/bin/phpunit', options))
		.on('error', (error) => {
			//msg.error(error);
		});
});

