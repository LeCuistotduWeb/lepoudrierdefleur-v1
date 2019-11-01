const { src, dest, series, watch, parallel } = require('gulp');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const babel = require('gulp-babel');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');

const dir = './dist/';

function css() {
    return src('./css/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(minify())
        .pipe(autoprefixer())
        .pipe(dest(dir + '/css'));
}

function js() {
    return src('./js/**/*.js')
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        .pipe(uglify())
        .pipe(rename({ extname: '.min.js' }))
        .pipe(dest(dir + 'js/'));
}

function watcher() {
    watch('./css/scss/**/*.scss', { events: 'all' }, css);
    watch('js/*.js', { events: 'all' }, js);
};

exports.js = series(js);
exports.watcher = series(watcher);
exports.default = parallel(css, js)