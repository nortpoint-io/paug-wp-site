const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');
const csso = require('gulp-csso');
const sourcemaps = require('gulp-sourcemaps');
const header = require('gulp-header');
const sequence = require('run-sequence');
const zip = require('gulp-zip');
const browserSync = require('browser-sync').create();
const pkg = require('./package.json');

const THEME_NAME = 'agilepoznan';
const SRC_DIR = `wordpress/wp-content/themes/${THEME_NAME}`;
const THEME_FILE = `${THEME_NAME}.zip`;

const HEADER = [
	'/*',
	'Theme Name: Agile Poznań',
	'Author: nortpoint.io',
	'Author URI: http://nortpoint.io/',
	'Version: ${version}',
	'Text Domain: agilepoznan',
	'License: GNU General Public License v2 or later',
	'License URI: http://www.gnu.org/licenses/gpl-2.0.html',
	'*/',
	''
].join('\n');

gulp.task('clean', () => {
    return del(THEME_FILE);
});

gulp.task('styles', () => {
    return gulp.src(`${SRC_DIR}/scss/*.scss`)
		.pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(csso())
		.pipe(header(HEADER, {version: pkg.version}))
		.pipe(sourcemaps.write('.'))
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
		`!${SRC_DIR}/scss/*`
	], {base: './wordpress/wp-content/themes'})
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