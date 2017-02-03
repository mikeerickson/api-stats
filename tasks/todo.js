var gulp   = require('gulp');
var todo   = require('gulp-todo');
var msg    = require('gulp-messenger');
var chalk  = require('chalk');
var config = require('./gulp.config');

var files = [
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
