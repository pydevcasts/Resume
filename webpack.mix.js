const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    });

mix.styles([
    
    'public/frontend/landing/css/aos.css',
    'public/frontend/landing/css/css.css',
    'public/frontend/landing/css/italic.css',
    'public/frontend/landing/css/main.css',
    'public/frontend/landing/css/weloveiconfonts.com.css',
   
], 'public/css/all.css');

mix.scripts([
    'public/frontend/landing/js/aos.js',
    'public/frontend/landing/js/jquery.min.js',
    'public/frontend/landing/js/main.js'
], 'public/js/all.js');