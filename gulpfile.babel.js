// Last tested with Node v14.16.0

import gulp from 'gulp';
import {series, watch} from 'gulp';
import autoprefixer from 'gulp-autoprefixer';
import babel from 'gulp-babel';
import browserSync from 'browser-sync';
import cleanCSS from 'gulp-clean-css';
import concat from 'gulp-concat';
import del from 'del';
import fs from 'fs';
import imagemin from 'gulp-imagemin';
import mozjpeg from 'imagemin-mozjpeg';
import pngquant from 'imagemin-pngquant';
import notify from 'gulp-notify';
import rename from 'gulp-rename';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import svgSprite from 'gulp-svg-sprite';
import uglify from 'gulp-uglify';


// Compile SCSS
const compileSass = (cb) => {
  // Theme styles
  gulp.src('src/scss/styles.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded',
      sourceComments: 'map',
      sourceMap: 'sass'
    }).on('error', sass.logError))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream())
    .pipe(notify({
      message: 'SASS Status: Theme Styles Compiled',
      onLast: true
    }));
    
    // Editor styles
    // gulp.src('src/scss/editor/editor-styles.scss')
    // .pipe(sourcemaps.init())
    // .pipe(sass({
    //   outputStyle: 'expanded',
    //   sourceComments: 'map',
    //   sourceMap: 'sass'
    // }).on('error', sass.logError))
    // .pipe(autoprefixer('last 2 versions'))
    // .pipe(cleanCSS())
    // .pipe(sourcemaps.write('maps'))
    // .pipe(gulp.dest('css'))
    // .pipe(browserSync.stream())
    // .pipe(notify({
    //   message: 'SASS Status: Editor Styles Compiled',
    //   onLast: true
    // }));
  
  cb();
};

// Compile JS
const compileJS = (cb) => {
  // Theme scripts
  gulp.src(['src/js/vendor/*.js', 'src/js/*.js', '!src/js/editor.js'])
    .pipe(sourcemaps.init())
    .pipe(babel())
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest('js'))
    .pipe(browserSync.stream())
    .pipe(notify({
      message: 'JS Status: Theme Scripts Compiled',
      onLast: true
    }));

  // Editor scripts
  // gulp.src('src/js/editor.js')
  //   .pipe(sourcemaps.init())
  //   .pipe(babel())
  //   .pipe(uglify())
  //   .pipe(sourcemaps.write('maps'))
  //   .pipe(gulp.dest('js'))
  //   .pipe(browserSync.stream())
  //   .pipe(notify({
  //     message: 'JS Status: Editor Scripts Compiled',
  //     onLast: true
  //   }));

  cb();
};

// Process SVG
const processSVG = (cb) => {
  // Delete existing SVGs from images directory
  fs.access('images/*.svg', (err) => {
    if (err) {
      del('images/*.svg', { force: true });
    }
  });

  // Delete existing sprite PHP file from images directory
  fs.access('images/sprite.svg.php', (err) => {
    if (err) {
      del('images/sprite.svg.php', { force: true });
    }
  });

  // Save svgSprite config in a variable
  const config = {
    svg: {
      'xmlDeclaration': false
    },
    mode: {
      defs: {
        'dest': '.',
        'sprite': 'sprite.svg'
      },
      inline: true
    }
  };

  // Save sprite in the images directory
  gulp.src('src/images/svg-sprite/*.svg')
    .pipe(svgSprite(config))
    .pipe(gulp.dest('images'));

  // Copy sprite as PHP file for get_template_part()
  gulp.src('images/sprite.svg', {allowEmpty: true})
    .pipe(rename('sprite.svg.php'))
    .pipe(gulp.dest('images'));

  // Copy non-sprite SVGs to images directory
  gulp.src('src/images/*.svg')
    .pipe(gulp.dest('images'))
    .pipe(notify({
      message: 'Non-Sprite SVG Status: Copied',
      onLast: true
    }));
  
  cb();
};

// Process images
const processIMG = (cb) => {
  // Delete existing images from images directory
  fs.access('images/*.{png,jpg}', (err) => {
    if (err) {
      del('images/*.{png,jpg}', { force: true });
    }
  });

  // Compress images
  gulp.src('src/images/**/*.{png,jpg}')
    .pipe(imagemin([
      mozjpeg({
        quality: 80
      }),
      pngquant({
        speed: 1,
        strip: true,
        quality: [0.8, 0.8]
      })], {
      verbose: true
    }))
    .pipe(gulp.dest('images'))
    .pipe(notify({
      message: 'IMG Status: Optimized',
      onLast: true
    }));
  
  cb();
};

// Run BrowserSync server and watch code for updates
const server = (cb) => {
  browserSync.init({
    proxy: 'http://localhost:8888'
  });

  watch(['./src/scss/*.scss', './src/scss/*/*.scss', './src/scss/vendor/*/*.css'], series('compileSass'));
  watch(['./src/js/*.js', './src/js/vendor/*.js'], series('compileJS'));

  cb();
};

// Default task: compile Sass and JS, run server and watch for code updates
const defaultTask = series(compileSass, compileJS, server);

export {
  compileSass,
  compileJS,
  processSVG,
  processIMG,
  server
};

export default defaultTask;