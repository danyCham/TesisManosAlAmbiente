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

mix.styles([
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css',
    'resources/css/adminlte.min.css',
    'resources/css/bootstrap.min.css',
    'resources/css/font-awesome.min.css'
], 'public/css/plantilla.css') 
.js(['resources/js/app.js'],'public/js/app.js');
