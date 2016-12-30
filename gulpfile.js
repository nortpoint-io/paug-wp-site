const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');
const csso = require('gulp-csso');
const fs = require('fs');
const header = require('gulp-header');
const sequence = require('run-sequence');
const zip = require('gulp-zip');
const browserSync = require('browser-sync').create();

const THEME_NAME = 'agilepoznan';
const SRC_DIR = `wordpress/wp-content/themes/${THEME_NAME}`;
const THEME_FILE = `${THEME_NAME}.zip`;

gulp.task('clean', () => {
    return del(THEME_FILE);
});

gulp.task('styles', () => {
    return gulp.src(`${SRC_DIR}/scss/*.scss`)
        .pipe(sass())
        .pipe(csso())
		.pipe(header(fs.readFileSync(`${SRC_DIR}/version-info.txt`, 'utf8')))
        .pipe(gulp.dest(SRC_DIR))
		.pipe(browserSync.stream());
});

gulp.task('dev', ['styles'], () => {
	browserSync.init({
        proxy: 'localhost:8888'
    });
	
	gulp.watch(`${SRC_DIR}/scss/*.scss`, ['styles']);
	gulp.watch(`${SRC_DIR}/**/*.php`, browserSync.reload);
});

gulp.task('zip', () => {
	return gulp.src([
		`${SRC_DIR}/**/*`,
		`!${SRC_DIR}/scss`,
		`!${SRC_DIR}/version-info.txt`
	])
	.pipe(zip(THEME_FILE))
	.pipe(gulp.dest('.'));
});

gulp.task('build', (callback) => {
	sequence(
		'styles',
		'clean',
		'zip',
		callback
	);
});

gulp.task('default', ['dev']);