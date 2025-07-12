const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const autoprefixer = require('gulp-autoprefixer');

const paths = {
  scss: './wp-content/themes/wp-starter-theme/scss/',
  css: './wp-content/themes/wp-starter-theme/css/'
};

function componentsCSS() {
  return src(paths.scss + 'components/**/*.scss')
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest(paths.css + 'components'));
}

function partialsCSS() {
  return src(paths.scss + 'partials/**/*.scss')
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest(paths.css + 'partials'));
}

function pagesCSS() {
  return src(paths.scss + 'pages/**/*.scss')
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest(paths.css + 'pages'));
}

function mainCSS() {
  return src(paths.scss + 'main.scss')
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest(paths.css));
}

function watchFiles() {
  watch(paths.scss + 'components/**/*.scss', componentsCSS);
  watch(paths.scss + 'partials/**/*.scss', partialsCSS);
  watch(paths.scss + 'pages/**/*.scss', pagesCSS);
  watch(paths.scss + 'main.scss', mainCSS);
}

exports.default = series(
  parallel(componentsCSS, partialsCSS, pagesCSS, mainCSS),
  watchFiles
);
