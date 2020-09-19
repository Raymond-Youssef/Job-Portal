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

mix.styles([
    'resources/assets/css/vendor/bootstrap/css/bootstrap.css',
    'resources/assets/css/vendor/font-awesome/css/font-awesome.min.css',
    'resources/assets/css/vendor/ionicons/css/ionicons.min.css',
    'resources/assets/css/vendor/venobox/venobox.css',
    'resources/assets/css/vendor/owl.carousel/assets/owl.carousel.min.css',
    'resources/assets/css/vendor/aos/aos.css',
    'resources/assets/css/style.css'
], 'public/css/all.css');
