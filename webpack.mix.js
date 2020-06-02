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
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/custom.scss', 'public/css/custom.css')
    .copy('resources/css/datatables.min.css', 'public/css/datatables.min.css')
    .copy('resources/images', 'public/images')
    .copy('resources/js/custom.js', 'public/js/custom.js')
    .copy('resources/js/Chart.min.js', 'public/js/Chart.min.js')
    .copy('resources/js/datatables.min.js', 'public/js/datatables.min.js')
    .copy('node_modules/toastr/build/toastr.min.css', 'public/css/toastr.min.css')
    .copy('node_modules/toastr/build/toastr.min.js', 'public/js/toastr.min.js');
    


