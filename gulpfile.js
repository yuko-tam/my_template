
var gulp = require('gulp');
var sass = require('gulp-sass');
var imagemin = require('gulp-imagemin');
var webserver = require('gulp-webserver');
var plumber = require('gulp-plumber');
var del = require("del");
var concat = require("gulp-concat");
var Notifier = require('node-notifier');
//var notifier = new Notifier();
var eslint = require('gulp-eslint');

var destDir = 'public_html'; // 出力用ディレクトリ
var assetsDir = 'src';    // 作業用ディレクトリ
//var portNum = 8010;	// port番号

// Sassコンパイルタスク
gulp.task('file', function(){
    gulp.src([
        ''+assetsDir+'/**/*.html',
        ''+assetsDir+'/css/**',
        '!'+assetsDir+'/_**/*',
        '!'+assetsDir+'/**/_**/*',
        '!'+assetsDir+'/**/_*'
    ])
    .pipe(plumber())
    .pipe(gulp.dest(destDir));
});

// Sassコンパイルタスク
gulp.task('sass', function(){
  gulp.src('./'+assetsDir+'/_sass/*.scss')
    .pipe(plumber())
    .pipe(sass())
    .pipe(minifycss())
    .pipe(gulp.dest('./'+destDir+'/css/'))
});

// Sassコンパイルタスク
// gulp.task('css', function(){
//   gulp.src('./'+assetsDir+'/css/*.css')
//     .pipe(gulp.dest('./'+destDir+'/css/'))
// });


// Sassコンパイルタスク
gulp.task('html', function(){
  gulp.src('./'+assetsDir+'/**/*.html')
    .pipe(gulp.dest(destDir))
});

gulp.task('js', function(){
  gulp.src('./'+assetsDir+'/js/*.js')
    .pipe(gulp.dest('./'+destDir+'/js/'))
});


//画像圧縮
gulp.task('imagemin', function(){
    gulp.src(''+assetsDir+'/img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest(destDir+'/img'))
});


//jsの構文チェック
gulp.task('script', function(){
    gulp.src(''+assetsDir+'/js/**/*.js')
        .pipe(plumber({
            errorHandler: notify.onError('Error: <%= error.message %>')
        })) 
        .pipe(eslint()) 
        .pipe(eslint.format()) 
        .pipe(eslint.failAfterError()) 
        .pipe(gulp.dest(destDir));
});

// watchタスク(**/*.scss変更時に実行するタスク)
gulp.task('watch', function(){
  var sassWatch = gulp.watch('./'+assetsDir+'/_sass/*.scss', ['sass']);
  sassWatch.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
  var jsWatch = gulp.watch('./'+assetsDir+'/js/*.js', ['js']);
  jsWatch.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
  // var cssWatch = gulp.watch('./'+assetsDir+'/css/*.css', ['css']);
  // cssWatch.on('change', function(event) {
  //   console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  // });
  var htmlWatch = gulp.watch('./'+assetsDir+'/**/*.html', ['html']);
  htmlWatch.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });

  var imgWatch = gulp.watch('./'+assetsDir+'/img/**/*', ['imagemin']);
  imgWatch.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });


});






// //webserverで表示する
// gulp.task('webserver', function () {
//     gulp.src(destDir) 
//         .pipe(webserver({
//             host: 'localhost',
//             port: portNum,
//             livereload: true
//         }));
// });


// gulpのデフォルト動作としてsass-watchを実行
gulp.task('default', ['file','imagemin','watch']);