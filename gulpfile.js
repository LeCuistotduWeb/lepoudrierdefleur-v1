const { src, dest, series, watch, parallel } = require('gulp');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const babel = require('gulp-babel');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');

const dir = './dist/';

/**
 * Theme Js
 * @returns {*}
 */
function css() {
    return src(['./assets/css/scss/**/*.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(minify())
        .pipe(autoprefixer())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(dest(dir + 'css/'));
}

/**
 * Theme Js
 * @returns {*}
 */
function js() {
    return src('./assets/js/**/*.js')
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        .pipe(uglify())
        .pipe(rename({ extname: '.min.js' }))
        .pipe(dest(dir + 'js/'));
}

/**
 * Admin Css
 * @returns {*}
 * @constructor
 */
function adminCss() {
    return src(['./assets/admin/css/scss/**/*.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(minify())
        .pipe(autoprefixer())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(dest(dir + 'admin/css'));
}

/**
 * Admin Js
 * @returns {*}
 * @constructor
 */
function adminJs() {
    return src('./assets/admin/js/**/*.js')
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        .pipe(uglify())
        .pipe(rename({ extname: '.min.js' }))
        .pipe(dest(dir + 'admin/js/'));
}

/**
 * Watcher
 */
function watcher() {
    watch('./assets/css/scss/**/*.scss', { events: 'all' }, css);
    watch('./assets/js/*.js', { events: 'all' }, js);

    watch('./assets/admin/css/scss/**/*.scss', { events: 'all' }, adminCss);
    watch('./assets/admin/js/*.js', { events: 'all' }, adminJs);
}

exports.js = series(js, adminCss);
exports.css = series(css, adminJs);
exports.theme = parallel(css, js);

exports.adminCss = series(adminCss);
exports.adminJs = series(adminJs);
exports.admin = parallel(adminCss, adminJs);

exports.watch = series(watcher);
exports.default = parallel(css, js, adminCss, adminJs);
exports.production = parallel(css, js, adminCss, adminJs);