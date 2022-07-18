//import gulp from 'gulp';
//import imagemin from 'gulp-imagemin';
const gulp = require('gulp');

// npm install gulp-imagemin@7.1.0
// 8 версия не работает !
const imagemin = require('gulp-imagemin');
const imageminWebp = require('imagemin-webp');
const rename = require("gulp-rename");

const images = {
    src: 'src_images/**/*.{png,jpg}',
    dist: {
        big:      'dist_images_webp/big',
        c516x688: 'dist_images_webp/c516x688',
        c246x328: 'dist_images_webp/c246x328',
    }
}

function defaults(){
    console.log('defaults')
}

/**
 * Простое сжатие картинок с помощью imagemin - gifsicle/mozjpeg/optipng/svgo
 * @returns {*}
 */
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

/**
 * Сжатие картинки с помощью webP 900x1200
 * preset - photo
 * qualiti - 85
 * @returns {*}
 */
function images_to_webp_big(){
    return gulp.src(images.src)
        //.pipe(imagemin())
        .pipe(imagemin([
            imageminWebp({
                qualiti: 85,
                preset: 'photo',
                resize: {
                    width: 900,
                    height: 1200,
                },
            })
        ]))
        .pipe(rename(function (path) {
            // Returns a completely new object, make sure you return all keys needed!
            return {
                dirname: '', // + "/ciao"
                basename: path.basename, //  + "-goodbye"
                extname: ".webp"
            };
        }))
        .pipe(gulp.dest(images.dist.big))
}

/**
 * Сжатие картинки с помощью webP 516x688
 * preset - photo
 * qualiti - 85
 * @returns {*}
 */
function images_to_webp_c516x688(){
    return gulp.src(images.src)
        .pipe(imagemin([
            imageminWebp({
                qualiti: 85,
                preset: 'photo',
                resize: {
                    width: 516,
                    height: 688,
                },
            })
        ]))
        .pipe(rename(function (path) {
            // Returns a completely new object, make sure you return all keys needed!
            return {
                dirname: '', // + "/ciao"
                basename: path.basename, //  + "-goodbye"
                extname: ".webp"
            };
        }))
        .pipe(gulp.dest(images.dist.c516x688))
}

/**
 * Сжатие картинки с помощью webP 246x328
 * preset - photo
 * qualiti - 85
 * @returns {*}
 */
function images_to_webp_c246x328(){
    return gulp.src(images.src)
        .pipe(imagemin([
            imageminWebp({
                qualiti: 85,
                preset: 'photo',
                resize: {
                    width: 246,
                    height: 328,
                },
            })
        ]))
        .pipe(rename(function (path) {
            // Returns a completely new object, make sure you return all keys needed!
            return {
                dirname: '', // + "/ciao"
                basename: path.basename, //  + "-goodbye"
                extname: ".webp"
            };
        }))
        .pipe(gulp.dest(images.dist.c246x328))
}

/**
 * Сжатие картинок webP и создание 3-х пресетов
 * @returns {number}
 */
function images_to_webp(){
    images_to_webp_big();
    images_to_webp_c516x688();
    images_to_webp_c246x328();
    return 1;
}

exports.default = defaults;
exports.images_compress = images_compress;

exports.images_to_webp_big       = images_to_webp_big;
exports.images_to_webp_c516x688  = images_to_webp_c516x688;
exports.images_to_webp_c246x328  = images_to_webp_c246x328;
exports.images_to_webp           = images_to_webp;
