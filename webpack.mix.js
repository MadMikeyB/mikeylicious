let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .babel([
        'resources/assets/js/vendor/jquery.min.js',
        'resources/assets/js/vendor/jquery.scrolly.min.js',
        'resources/assets/js/vendor/browser.min.js',
        'resources/assets/js/vendor/breakpoints.min.js',
        'resources/assets/js/vendor/util.js',
        'resources/assets/js/vendor/main.js',
    ], 'public/js/vendor.js')
    .sourceMaps()
    .options({
        processCssUrls: false
    })
    .copy('resources/assets/img', 'public/images')
    .copy('resources/assets/fonts/fontawesome', 'public/webfonts');
