const gulp = require('gulp');
const livereload = require('gulp-livereload');
const config = require('../config');

const files = [
	...config.scripts.server,
	...config.scripts.client,
	...config.scripts.sass
];

gulp.task('reload', () =>{
	livereload.reload();
});

gulp.task('debug', () => {
	livereload.listen({
	});
	gulp.watch(files,['reload']);
});