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
mix.styles('resources/css/bootstrap.css', 'public/css/clients/bootstrap.css');
mix.styles('resources/css/flaticon.css', 'public/css/clients/flaticon.css');
mix.styles('resources/css/nice-select.css', 'public/css/clients/nice-select.css');
mix.styles('resources/css/owl.carousel.min.css', 'public/css/clients/owl.carousel.min.css');
mix.styles('resources/css/themify-icons.css', 'public/css/clients/themify-icons.css');
mix.styles('resources/css/style.css', 'public/css/clients/style.css');
mix.copyDirectory('resources/fonts', 'public/css/fonts');
mix.copyDirectory('resources/js/clients', 'public/js/clients');

