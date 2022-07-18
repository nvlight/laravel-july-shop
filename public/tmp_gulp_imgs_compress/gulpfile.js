//import gulp from 'gulp';
//import imagemin from 'gulp-imagemin';
const gulp = require('gulp');

// npm install gulp-imagemin@7.1.0
// 8 версия не работает !
const imagemin = require('gulp-imagemin');
const imageminWebp = require('imagemin-webp');
const rename = require("gulp-rename");
const del = require('del');
const { copyLibs } = require('gulp-copy-libs')

const images = {
    src: {
        match: 'src_images/**/*.{png,jpg}',
        path:  'src_images',
    },
    dist: {
        base_path:     'dist_images_webp',
        big:      'dist_images_webp/big',
        c516x688: 'dist_images_webp/c516x688',
        c246x328: 'dist_images_webp/c246x328',
        orig:     'dist_images_webp/orig',
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
    return gulp.src(images.src.match)
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
    return gulp.src(images.src.match)
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
    return gulp.src(images.src.match)
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
    clearImagesDistFolder();
    images_to_webp_big();
    images_to_webp_c516x688();
    images_to_webp_c246x328();
    copy_orig_images_to_dist();
    //clearImagesSrcFolder();
    return 1;
}

/**
 * Удалить синхронно файлы и папки
 */
function del_test_files(){
    let delFiles = 'for_del/**';
    //del.sync(['public/assets/**', '!public/assets/goat.png']);
    del.sync([delFiles]);
}

/**
 * Удалить синхронно файлы и папки с оригинальными картинками
 */
function clear_folder(path){
    del.sync([path]);
}

function clearImagesDistFolder(){
    let path = images.dist.base_path+"/**"; // "dist_images_webp/**";
    del.sync([path]);
}

function clearImagesSrcFolder(){
    let path = images.src.path+"/**"; // "dist_images_webp/**";
    del.sync([path]);

    // (async () => {
    //     const deletedPaths = await del([path]);
    // })();
}

/**
 * Скопировать после сжатия оригинальные картинку в выходную папку + /orig/**
 */
function copy_orig_images_to_dist(){
    const pathConfig = [{
        outputDirectory: images.dist.orig + '/', // 'test-libs/jquery/',
        inputFiles: images.src.path + '/**', //'node_modules/jquery/dist/*.js'
    }];
    copyLibs(pathConfig);
}

exports.default = defaults;
exports.images_compress = images_compress;

exports.images_to_webp_big       = images_to_webp_big;
exports.images_to_webp_c516x688  = images_to_webp_c516x688;
exports.images_to_webp_c246x328  = images_to_webp_c246x328;
exports.images_to_webp           = images_to_webp;

exports.del_test_files = del_test_files;
//exports.clear_images_dist_folder = clear_folder(images.dist.base_path+"/**");
exports.clear_images_dist_folder = clearImagesDistFolder;
exports.clearImagesSrcFolder     = clearImagesSrcFolder;

exports.copy_orig_images_to_dist = copy_orig_images_to_dist;
