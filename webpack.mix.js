const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('resources/fonts', 'public/css/fonts');
mix.copyDirectory('resources/js/clients', 'public/js/clients');
mix.copyDirectory('resources/css/clients', 'public/css/clients');
mix.copyDirectory('resources/css/clients/codes', 'public/css/clients/codes');
mix.copyDirectory('resources/js/clients/codes', 'public/js/clients/codes');

//
mix.sass('resources/sass/libs.scss', 'public/css')
    .sass('resources/sass/vendor.scss', 'public/css');

mix.copyDirectory('resources/js/libs', 'public/js');
