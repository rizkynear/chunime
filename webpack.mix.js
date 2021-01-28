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
        'public/css/elegant-icons.min.css',
        'public/css/plyr.css',
        'public/css/nice-select.min.css',
        'public/css/owl.carousel.min.css',
        'public/css/slicknav.min.css',
        "public/css/styleuser.min.css"
    ],
    "public/css/user-all.css"
);

mix.scripts(
    [
        "public/js/jquery-3.3.1.min.js",
        "public/js/bootstrap.min.js",
        "public/js/player.min.js",
        "public/js/jquery.nice-select.min.js",
        "public/js/mixitup.min.js",
        "public/js/jquery.slicknav.min.js",
        "public/js/owl.carousel.min.js",
        "public/js/main.min.js"
    ],
    "public/js/user-all.js"
);

if (mix.inProduction()) {
    mix.version();
}