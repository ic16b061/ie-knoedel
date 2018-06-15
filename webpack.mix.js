let mix = require('laravel-mix');

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

mix.copy('node_modules/holderjs/holder.min.js', 'public/js/holder.min.js');

/*
mix.copy('node_modules/jquery/dist/jquery.slim.min.js', 'public/js/jquery.slim.min.js');
mix.copy('node_modules/popper.js/dist/popper.min.js', 'public/js/popper.min.js');
mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');
mix.copy('node_modules/bootstrap-validator/js/validator.js', 'public/js/validator.js');
*/

/*
mix.scripts([
    'public/js/holder.min.js',
    'public/js/jquery.slim.min.js',
    'public/js/popper.min.js',
    'public/js/bootstrap.min.js',
], 'public/js/all.js')
    .sass('resources/assets/sass/app.scss', 'public/css');
*/

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');
