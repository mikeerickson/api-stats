/*global require*/

const gulp   = require('gulp');
const todo   = require('gulp-todo');
const msg    = require('gulp-messenger');
const chalk  = require('chalk');
const config = require('./gulp.config');

const files = [
	'./app/**/*.php',
	'./routes/**/*.php',
	'./tasks/**/*.js',
	'./specs/**/*.js'
];

gulp.task('todo', () => {
	gulp.src(files)
	.pipe(todo())
	.pipe(gulp.dest('./'))
	.on('end', function () {
		msg.log(chalk.green.bold(`${config.icon.pass} ${chalk.cyan.bold('./TODO.md')} Created Successfully`));
	});
});
