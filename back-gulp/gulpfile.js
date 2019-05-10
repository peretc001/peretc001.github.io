var syntax        = 'sass', // Syntax: sass or scss;
		gulpversion   = '4'; // Gulp version: 3 or 4


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
		imageResize   = require('gulp-image-resize'),
		imagemin      = require('gulp-imagemin');
		gm      			= require('gm');
		

gulp.task('browser-sync', function() {
	browserSync({
		server: {
			baseDir: 'app'
		},
		notify: false,
		// open: false,
		// online: false, // Work Offline Without Internet Connection
		// tunnel: true, tunnel: "projectname", // Demonstration page: http://projectname.localtunnel.me
	})
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

// JS
gulp.task('scripts', function() {
	return gulp.src([
		'app/js/common.js', // Always at the end
		])
	.pipe(concat('scripts.min.js'))
	// .pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('app/js'))
	.pipe(browserSync.reload({ stream: true }))
});

gulp.task('code', function() {
	return gulp.src('app/*.html')
	.pipe(browserSync.reload({ stream: true }))
});

// Images @x1 & @x2 + Compression | Required graphicsmagick (sudo apt update; sudo apt install graphicsmagick)
gulp.task('imgx1', function() {
	return gulp.src('app/img/_src/*.*')
	.pipe(imageResize({ width: '50%' }))
	.pipe(imagemin())
	.pipe(gulp.dest('app/img/@1x/'))
});
gulp.task('imgx2', function() {
	return gulp.src('app/img/_src/*.*')
	.pipe(imageResize({ width: '100%' }))
	.pipe(imagemin())
	.pipe(gulp.dest('app/img/@2x/'))
});

	
  gulp.task('img', gulp.parallel('imgx1', 'imgx2'));

	gulp.task('watch', function() {
		gulp.watch('app/'+syntax+'/**/*.'+syntax+'', gulp.parallel('styles'));
		gulp.watch(['app/*.js', 'app/js/common.js'], gulp.parallel('scripts'));
		gulp.watch('app/*.html', gulp.parallel('code'));
		gulp.watch('app/img/_src/**/*', gulp.parallel('img'));
	});
	gulp.task('default', gulp.parallel( 'img', 'styles', 'scripts', 'browser-sync', 'watch' ));
