var syntax        = 'sass';


var gulp          = require('gulp'),
		gutil         = require('gulp-util' ),
		sass          = require('gulp-sass'),
		browserSync   = require('browser-sync'),
		concat        = require('gulp-concat'),
		uglify        = require('gulp-uglify'),
		cleancss      = require('gulp-clean-css'),
		rename        = require('gulp-rename'),
		autoprefixer  = require('gulp-autoprefixer'),
		notify        = require('gulp-notify'),
		del           = require('del'),
		cache         = require('gulp-cache'),
		imagemin      = require('gulp-imagemin'),
		php 	  	  		= require('gulp-connect-php'),
		rsync         = require('gulp-rsync');

gulp.task('browser-sync', function() {
	browserSync.init({
		host: 'app',
		port: 8010
  });
});

gulp.task('styles', function() {
	return gulp.src('app/'+syntax+'/**/*.'+syntax+'')
	.pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
	.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('app/css'))
	.pipe(browserSync.stream())
});

gulp.task('scripts', function() {
	return gulp.src([
		'app/js/common.js', // Always at the end
		])
	.pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('app/js'))
	.pipe(browserSync.reload({ stream: true }))
});

gulp.task('code', function() {
	return gulp.src('app/*.html')
	.pipe(browserSync.reload({ stream: true }))
});

	gulp.task('php', function() {
		php.server({ base: 'app', port: 8010, keepalive: true});
	});
	gulp.task('server', function() {
		gulp.watch('app/'+syntax+'/**/*.'+syntax+'', gulp.parallel('styles'));
		gulp.watch('app/**/*.html').on('change', browserSync.reload);
		gulp.watch('app/**/*.php').on('change', browserSync.reload);
  });	
  gulp.task('server', gulp.parallel('server', 'php', 'browser-sync'));
	gulp.task('watch', function() {
		gulp.watch('app/'+syntax+'/**/*.'+syntax+'', gulp.parallel('styles'));
		gulp.watch('app/*.html', gulp.parallel('code'));
	});
	gulp.task('default', gulp.parallel('watch', 'browser-sync'));

