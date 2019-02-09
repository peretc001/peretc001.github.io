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
		del           = require('del'),
		cache         = require('gulp-cache'),
		imagemin      = require('gulp-imagemin'),
		connect 	  = require('gulp-connect-php'),
		rsync         = require('gulp-rsync');

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

gulp.task('imagemin', function() {
	return gulp.src('app/img/**/*')
	.pipe(cache(imagemin())) // Cache Images
	.pipe(gulp.dest('dist/img')); 
});

// gulp.task('rsync', function() {
// 	return gulp.src('app/**')
// 	.pipe(rsync({
// 		root: 'app/',
// 		hostname: 'username@yousite.com',
// 		destination: 'yousite/public_html/',
// 		// include: ['*.htaccess'], // Includes files to deploy
// 		exclude: ['**/Thumbs.db', '**/*.DS_Store'], // Excludes files from deploy
// 		recursive: true,
// 		archive: true,
// 		silent: false,
// 		compress: true
// 	}))
// });

gulp.task('removedist', function() { return del.sync('dist'); });

gulp.task('build', function() {

		var buildFiles = gulp.src([
			'app/*.html',
			'app/.htaccess',
			]).pipe(gulp.dest('dist'));

		var buildCss = gulp.src([
			'app/css/**',
			]).pipe(gulp.dest('dist/css'));

		var buildJs = gulp.src([
			'app/js/**',
			]).pipe(gulp.dest('dist/js'));
		var buildJs = gulp.src([
			'app/img/**',
			]).pipe(cache(imagemin())).pipe(gulp.dest('dist/img'));

		var buildFonts = gulp.src([
			'app/fonts/**/*',
			]).pipe(gulp.dest('dist/fonts'));

	});

if (gulpversion == 3) {
	gulp.task('watch', ['browser-sync'], function() {
		gulp.watch('app/'+syntax+'/**/*.'+syntax+'', ['styles']);
		gulp.watch(['libs/**/*.js', 'app/js/common.js'], ['scripts']);
		gulp.watch('app/*.html', ['code'])
	});
	gulp.task('default', ['watch']);
}

if (gulpversion == 4) {

	gulp.task('connect-sync', function() {
	  connect.server();
	 
	  gulp.watch('**/*.php').on('change', function () {
	    browserSync.reload();
	  });
	});


	gulp.task('watch', function() {
		gulp.watch('app/'+syntax+'/**/*.'+syntax+'', gulp.parallel('styles'));
		//gulp.watch('app/js/common.js', gulp.parallel('scripts'));
		gulp.watch('app/*.html', gulp.parallel('code'));
		gulp.watch('app/*.php', gulp.parallel('code'))
	});
	gulp.task('default', gulp.parallel('watch', 'browser-sync', 'connect-sync'));
	gulp.task('bild', gulp.parallel('build', 'removedist', 'imagemin', 'styles', 'scripts'));

	
}
