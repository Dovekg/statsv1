var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix.sass('app.scss')
    .scripts([
    	'vendor/jquery/dist/jquery.min.js',
    	'vendor/bootstrap/dist/js/bootstrap.min.js'
    	], elixir.config.publicPath + '/' + elixir.config.js.outputFolder + '/scripts.js', elixir.config.assetsPath);

    mix.version([
        'css/app.css',
        'js/scripts.js'
    ]);

    mix.copy('resources/assets/vendor/font-awesome/fonts/', 'public/build/fonts/', './')


	mix.styles([
	'icons/icomoon/styles.css',
	'bootstrap.min.css',
	'core.min.css',
	'components.min.css',
	'colors.min.css',
	'sweetalert.css',
	'swiper.min.css',
	])
	.scripts([
	'core/libraries/jquery.min.js',
	'core/libraries/bootstrap.min.js',
	'core/app.min.js',
	'sweetalert.min.js',
	'swiper.min.js',
	'plugins/loaders/pace.min.js',
	'plugins/loaders/blockui.min.js',
	'plugins/forms/styling/uniform.min.js',
	'pages/login.js',
	'plugins/loaders/pace.min.js',
	'plugins/forms/selects/select2.min.js',
	'plugins/forms/styling/uniform.min.js',
	'pages/form_layouts.js',
	'core/libraries/jquery_ui/interactions.min.js',
	'pages/form_select2.js',
	]);
});
