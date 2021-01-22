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

mix.styles(
    [
        'public/css/bootstrap.min.css',
        'public/css/font-awesome.min.css',
        'public/css/elegant-icons.css',
        'public/css/plyr.css',
        'public/css/nice-select.css',
        'public/css/owl.carousel.min.css',
        'public/css/slicknav.min.css',
        "public/css/styleuser.css"
    ],
    "public/css/alluser.css"
);

mix.scripts(
    [
        "public/js/jquery-3.3.1.min.js",
        "public/js/bootstrap.min.js",
        "public/js/player.js",
        "public/js/jquery.nice-select.min.js",
        "public/js/mixitup.min.js",
        "public/js/jquery.slicknav.js",
        "public/js/owl.carousel.min.js",
        "public/js/main.js"
    ],
    "public/js/alluser.js"
);

if (mix.inProduction()) {
    mix.version();
}