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
    .copy('resources/images', 'public/images')
    .copy('resources/js/custom.js', 'public/js/custom.js')
    .copy('resources/js/Chart.min.js', 'public/js/Chart.min.js')
    .copy('resources/js/jquery.tabledit.min.js', 'public/js/jquery.tabledit.min.js')
    .copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'public/css/dataTables.bootstrap4.min.css')
    .copy('node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css', 'public/css/responsive.bootstrap4.min.css')
    .copy('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'public/js/dataTables.bootstrap4.min.js')
    .copy('node_modules/datatables.net/js/jquery.dataTables.min.js', 'public/js/jquery.dataTables.min.js')
    .copy('node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js', 'public/js/responsive.bootstrap4.min.js');

    