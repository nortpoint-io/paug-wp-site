var gulp = require('gulp');
var sass = require('gulp-sass');
var del = require('del');
var csso = require('gulp-csso');
var fs = require('fs');
var header = require('gulp-header');

var THEME_NAME = 'agilepoznan';
var SRC_DIR = 'wordpress/wp-content/themes/' + THEME_NAME;
var DIST_DIR = THEME_NAME;

gulp.task('clean', function() {
    return del(DIST_DIR);
});

gulp.task('styles', function() {
    return gulp.src(SRC_DIR + '/scss/*.scss')
        .pipe(sass())
        .pipe(csso())
		.pipe(header(fs.readFileSync(SRC_DIR + '/version-info.txt', 'utf8')))
        .pipe(gulp.dest(SRC_DIR));
});

gulp.task('watch', ['styles'], function() {
	gulp.watch(SRC_DIR + '/scss/*.scss', ['styles']);
});

gulp.task('build', ['clean', 'styles'], function() {
	return gulp.src([
		SRC_DIR + '**/*',
		'!' + SRC_DIR + '/scss',
		'!' + SRC_DIR + '/version-info.txt'
	])
	.pipe(gulp.dest('.'));
});

gulp.task('default', ['watch']);