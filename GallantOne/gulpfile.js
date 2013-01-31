var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var compass = require('gulp-compass');
var source = require('vinyl-source-stream'); 
var livereload = require('gulp-livereload');

var paths = {
    lib_react_jsx: ['lib/react/jsx/*'],
    lib_bootstrap: ['lib/bootstrap/'],
    src_bootstrap: ['lib/bootstrap/assets/stylesheets/*.scss'],
    glib_react: ['lib/react/js/*.js'],
    glib_css: 'lib/css/',
    glib_js: ['lib/react/js']
};


gulp.task('default', ['boot', 'watch']);


gulp.task('boot', function() {
    gulp.src(['lib/bootstrap/assets/stylesheets/_bootstrap.scss']) 
        .pipe(compass({
            bootstrap: paths.src_bootstrap 
        }))
        .pipe(gulp.dest(paths.glib_css));
});


gulp.task('watch', function() {

    console.log('gulp start watching');
    livereload.listen();
    gulp.watch(paths.src_bootstrap, ['styles']); 

});

