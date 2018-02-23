let mix = require('laravel-mix');


mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});

mix.js(['node_modules/jquery/dist/jquery.js',
	'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
	'resources/assets/js/app.js'],'public/js/all.js')
   .sass('resources/assets/sass/app.scss', 'public/css');

//mix.browserSync('blog.dev');

