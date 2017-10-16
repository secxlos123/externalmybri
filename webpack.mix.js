const { mix } = require('laravel-mix');

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

mix
   // .js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/dropdown.js', 'public/js/dropdown.min.js')
   .js('resources/assets/js/numeric.js', 'public/js/numeric.min.js')
   .js('resources/assets/js/main-dropzone.js', 'public/js/main-dropzone.min.js');
   // .styles('resources/assets/css/style-dropzone.css', 'public/css/style-dropzone.min.css');
   // .sass('resources/assets/sass/app.scss', 'public/css');
