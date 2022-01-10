const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/assets/js/fullcalendar.js', 'public/assets/js/fullcalendar.js')
    .js('resources/assets/js/datatable.js', 'public/assets/js/datatable.js')
    .sass('resources/assets/custom-theme/sidemenu.scss', 'public/assets/css')
    .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
