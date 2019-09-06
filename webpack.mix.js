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
    .sass('resources/sass/style.scss','public/css')
    .sass('resources/sass/user_profile.scss','public/css')
    .sass('resources/sass/admin_style.scss','public/css')
    .sass('resources/sass/datatables.min.scss','public/css')
    .copy('node_modules/material-icons/css/material-icons.min.css', 'public/css/material-icons.min.css');
mix.js('resources/js/user_profile.js', 'public/js')
    .js('resources/js/datatables.min.js','public/js');
