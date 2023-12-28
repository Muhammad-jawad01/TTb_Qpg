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

mix.js('resources/js/app.js', 'public/assets/js')
    .postCss('resources/css/app.css', 'public/assets/css', [
        //
    ]);

mix.styles([
    'public/plugins/bootstrap/css/bootstrap.min.css',
    'public/assets/css/main.css',
    'public/assets/css/structure.css',
    'public/plugins/perfect-scrollbar/perfect-scrollbar.css',
    'public/plugins/highlight/styles/monokai-sublime.css',
    'public/assets/css/darkmode/global.css',
    'public/assets/css/darkmode/dashboard.css',
    'public/assets/css/darkmode/apps.css',
    'public/assets/css/darkmode/basic_ui.css',
    'public/assets/css/darkmode/forms.css',
    'public/assets/css/darkmode/datatables.css',
    'public/assets/css/darkmode/pages.css',
    'public/assets/css/darkmode/ui_elements.css',
    'public/assets/css/darkmode/widgets.css',
    'public/assets/css/darkmode/charts.css',
], 'public/assets/css/all.css');

mix.scripts([
    'public/assets/js/libs/jquery-3.6.0.min.js',
    'public/plugins/bootstrap/js/popper.min.js',
    'public/plugins/bootstrap/js/bootstrap.min.js',
    'public/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
    'public/assets/js/main.js',
    'public/assets/js/custom.js',
], 'public/assets/js/all.js');
