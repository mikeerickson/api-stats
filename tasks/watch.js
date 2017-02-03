const gulp = require('gulp');
const msg  = require('gulp-messenger');

const scriptFiles = ['./tasks/**/*.js', './src/**/*.js', 'gulpfile.js', '!node_modules/**'];

gulp.task('watch:scripts', ['scripts'], () => {
	msg.note(`==> Watching Script Files (${scriptFiles})`);
	gulp.watch(scriptFiles, ['scripts']);
});

gulp.task('watch:lint', ['lint'], () => {
	msg.note(`==> Watching Lint Files (${scriptFiles})`);
	gulp.watch(scriptFiles, ['lint']);
});

gulp.task('watch',['watch:scripts','watch:lint']);