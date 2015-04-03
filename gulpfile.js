var gulp = require('gulp');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-ruby-sass');
var uglify = require("gulp-uglify");
var browser = require("browser-sync");
var plumber = require("gulp-plumber");

gulp.task("server", function() {
    browser({
        server: {
            baseDir: "./"
        }
    });
});

gulp.task("js", function() {
    gulp.src(["js/common.js"])
        .pipe(plumber())
        .pipe(uglify())
        .pipe(gulp.dest("./js/min"))
        .pipe(browser.reload({stream:true}))
});
 
gulp.task("sass", function() {
    gulp.src(["scss/**/*.scss"])
        .pipe(plumber())
        .pipe(sass({style : 'expanded', compass : true}))
        .pipe(autoprefixer())
        .pipe(gulp.dest("./css"))
        .pipe(browser.reload({stream:true}))
});
 
gulp.task("default",['server'], function() {
    gulp.watch(["js/common.js"],["js"]);
    gulp.watch("scss/**/*.scss",["sass"]);
});