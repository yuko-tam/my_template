
// plagin 定義
var gulp      = require('gulp');
var sass      = require('gulp-ruby-sass');
var connect   = require('gulp-connect');
var plumber   = require('gulp-plumber');
var notify    = require('gulp-notify');

//パスの定義
var paths = {
        sass: './src/less',
        css_build: './assets/css',
         // jsファイルのパス情報を追加
        js: './src/js',
        js_build: './assets/js'       
    };

