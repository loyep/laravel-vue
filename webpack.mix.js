const mix = require('laravel-mix');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const { IgnorePlugin } = require('webpack');
const SimpleProgressWebpackPlugin = require('simple-progress-webpack-plugin');

const pathResolve = dir => require('path').join(__dirname, dir);

const { env } = require('minimist')(process.argv.slice(2));
const isAdmin = env && env.admin;

let basePath = 'app';
if (isAdmin) {
    basePath = 'admin'
}

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

const webpackConfig = {
    plugins: [
        new IgnorePlugin(/^\.\/locale$/, /moment$/),
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                pathResolve(`public/static/${basePath}/*`)
            ],
            verbose: true
        }),
        new SimpleProgressWebpackPlugin()
    ],
    resolve: {
        extensions: ['.vue'],
        alias: {
            '@sass': pathResolve('resources/sass'),
            '@': pathResolve('resources/js'),
            '@assets': pathResolve('resources/assets'),
            '@js': pathResolve('resources/js'),
            '@app': pathResolve('resources/js/app'),
            '@admin': pathResolve('resources/js/admin')
        },
        modules: [
            'node_modules',
            pathResolve('resources')
        ]
    },
    module: {
        rules: [
           //
        ]
    },
    output: {
        publicPath: `/static/${basePath}/`
    }
};

mix.webpackConfig(webpackConfig);

if (isAdmin) {
    mix.sass('resources/sass/admin.scss', 'css/admin.css')
        .js('resources/js/admin/admin.js', 'js/admin.js');
} else {
    mix.sass('resources/sass/app.scss', 'css/app.css')
       .js('resources/js/app/app.js', 'js/app.js');
}

mix
    .options({
        extractVueStyle: true,
        clearConsole: false
    })
    .setPublicPath(`public/static/${basePath}`)
    .setResourceRoot(`/static/${basePath}/`)
    .version()
    .disableSuccessNotifications();

if (mix.inProduction()) {
    mix.version();
}
