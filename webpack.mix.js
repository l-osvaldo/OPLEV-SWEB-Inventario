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

mix.copyDirectory('resources/assets/css', 'public/css');
mix.copyDirectory('resources/assets/images', 'public/images');
mix.copyDirectory('resources/assets/js', 'public/js');
mix.copyDirectory('resources/assets/vendor_components', 'public/vendor_components');
mix.copyDirectory('resources/assets/plugins', 'public/plugins');
mix.copyDirectory('resources/assets/dist/css', 'public/dist/css');
