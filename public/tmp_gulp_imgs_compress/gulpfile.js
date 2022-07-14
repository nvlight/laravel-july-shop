//import gulp from 'gulp';
//import imagemin from 'gulp-imagemin';
const gulp = require('gulp');

// npm install gulp-imagemin@7.1.0
// 8 версия не работает !
const imagemin = require('gulp-imagemin');
const imageminWebp = require('imagemin-webp');
const rename = require("gulp-rename");

function defaults(){
    console.log('defaults')
}

function images_compress(){
    return gulp.src('images/**/*.{png,jpg}')
        //.pipe(imagemin())
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.mozjpeg({quality: 75, progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(gulp.dest('dist'))
}

function images_to_webp(){
    return gulp.src('images/**/*.{png,jpg}')
        //.pipe(imagemin())
        .pipe(imagemin([
            imageminWebp({
                qualiti: 85,
                preset: 'photo',
            })
        ]))
        .pipe(rename(function (path) {
            // Returns a completely new object, make sure you return all keys needed!
            return {
                dirname: path.dirname, // + "/ciao"
                basename: path.basename, //  + "-goodbye"
                extname: ".webp"
            };
        }))
        .pipe(gulp.dest('dist_webp'))
}

exports.default = defaults;
exports.images_compress = images_compress;
exports.images_to_webp  = images_to_webp;
