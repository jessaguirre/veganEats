var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    browserSync = require('browser-sync').create()

var paths = {
    scss: './css/**/*.scss',
    css: './css',
};

gulp.task('browser-sync', function () {
    browserSync.init({
        logPrefix: 'VeganEats',
        proxy:     'veganeats.test',
        notify:    false,
        open:      'external',
        ghost:     false,
        // Change this property with files of your project
        // that you want to refresh the page on changes.
        files:     [
            './index.php'
        ]
    });
});

gulp.task('sass', function () {
  return gulp.src(paths.scss)
    .pipe(sass())
    .pipe(gulp.dest(paths.css))
    .pipe( browserSync.stream() );
});

gulp.task('uglify', function() {
    return gulp.src(paths.jsSrc)
        .pipe(plumber({errorHandler: notify.onError("JS uglification error: <%= error.message %>")}))
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.js))
        .pipe( browserSync.stream() );
});

gulp.task('build', function() {
  runSequence('sass');
});

gulp.task('watch', function() {
  gulp.watch(paths.scss, ['sass']);
});

gulp.task('default', function () {
  runSequence('browser-sync');
  gulp.watch(paths.scss, ['sass']);
});
