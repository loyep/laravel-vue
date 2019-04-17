const webpack = require('webpack');
const mix = require('laravel-mix');
const path = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const { admin } = require('yargs').argv.env

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


// mix.setResourceRoot('/static/admin');
mix
    // .options({
    //     extractVueStyles: false,
    // })
    // .setPublicPath('public/static/admin')
    .sass('resources/styles/index.scss', 'public/static/admin/admin.css')
    .setPublicPath('public/static/admin')
    .js('resources/admin/main.js', 'public/static/admin/js/admin.js');

mix.version();

if (mix.inProduction()) {
    mix.disableNotifications();
} else {
    mix.sourceMaps();
}

const config = {
    plugins: [
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/admin')
        },
        modules: [
            'node_modules'
        ]
    },
    output: {
        chunkFilename: `chunk/[name].${ mix.inProduction() ? '[chunkhash].' : '' }js`,
        publicPath: '/static/admin/'
    }
}

mix.webpackConfig(config);
