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

mix.copy('resources/js/clients/jquery-3.2.1.min.js', 'public/js/jquery-3.2.1.min.js');
mix.copy('resources/js/clients/bootstrap.min.js', 'public/js/bootstrap.min.js');
mix.copy('resources/js/clients/popper.js', 'public/js/clients/popper.js');
mix.copy('resources/js/clients/gmaps.min.js', 'public/js/clients/gmaps.min.js');
mix.copy('resources/js/clients/jquery.sticky-kit.min.js', 'public/js/clients/jquery.sticky-kit.min.js');
mix.copy('resources/js/clients/jquery.nice-select.min.js', 'public/js/clients/jquery.nice-select.min.js');
mix.copy('resources/js/clients/owl-carousel-thumb.min.js', 'public/js/clients/owl-carousel-thumb.min.js');
mix.copy('resources/js/clients/owl.carousel.min.js', 'public/js/clients/owl.carousel.min.js');
mix.js('resources/js/clients/jquery.ajaxchimp.min.js', 'public/js/clients/jquery.ajaxchimp.min.js');
mix.js('resources/js/clients/mail-script.js', 'public/js/clients/mail-script.js');
mix.js('resources/js/clients/theme.js', 'public/js/clients/theme.js');
mix.js('resources/js/clients/item.js', 'public/js/clients/item.js');
