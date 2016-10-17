var gulp = require('gulp');
var sass = require('gulp-sass');
var del = require('del');
var csso = require('gulp-csso');
var fs = require('fs');
var header = require('gulp-header');
var sequence = require('run-sequence');
var zip = require('gulp-zip');

var THEME_NAME = 'agilepoznan';
var SRC_DIR = 'wordpress/wp-content/themes/' + THEME_NAME;
var THEME_FILE = THEME_NAME + '.zip';

gulp.task('clean', function() {
    return del(THEME_FILE);
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

gulp.task('zip', function() {
	return gulp.src([
		SRC_DIR + '/**/*',
		'!' + SRC_DIR + '/scss',
		'!' + SRC_DIR + '/version-info.txt'
	])
	.pipe(zip(THEME_FILE))
	.pipe(gulp.dest('.'));
});

gulp.task('build', function(callback) {
	sequence(
		'styles',
		'clean',
		'zip',
		callback
	);
});

gulp.task('default', ['watch']);