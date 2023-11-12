// const mix = require('laravel-mix');
//
// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */
//
// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sourceMaps();
const mix = require('laravel-mix');
const vite = require('vite');

mix.extend('vite', new class {
    webpackConfig(webpackConfig) {
        return vite.build(webpackConfig);
    }
});

mix.js('resources/js/app.js', 'public/js')
    .vite();
