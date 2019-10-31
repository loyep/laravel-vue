const mix = require('laravel-mix');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const { IgnorePlugin } = require('webpack');
const SimpleProgressWebpackPlugin = require('simple-progress-webpack-plugin');
const LiveReloadPlugin = require('webpack-livereload-plugin');
require('laravel-mix-versionhash')

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
            dry: true
        }),
        new SimpleProgressWebpackPlugin(),
        new LiveReloadPlugin()
    ],
    resolve: {
        extensions: ['.vue'],
        alias: {
            '@style': pathResolve('resources/sass'),
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

        ]
    },
    output: {
        publicPath: `/static/${basePath}/`
    }
};

mix.webpackConfig(webpackConfig);

if (isAdmin) {
    mix.sass('resources/sass/admin.scss', 'css')
       .js('resources/js/admin/admin.js', 'js');
} else {
    mix.sass('resources/sass/app.scss', 'css')
       .js('resources/js/app/app.js', 'js');
}

mix
    .options({
        extractVueStyle: true,
        clearConsole: false
    })
    .setPublicPath(`public/static/${basePath}`)
    .setResourceRoot(`/static/${basePath}/`)
    .disableSuccessNotifications();

if (mix.inProduction()) {
    mix.versionHash();
}
