const webpack = require('webpack');
const mix = require('laravel-mix');
const path = require('path');

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

const config = {
    plugins: [
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js/admin')
        },
        modules: [
            'node_modules',
            path.resolve(__dirname, "resources")
        ]
    },
    output: {
        chunkFilename: `chunk/[name].${mix.inProduction() ? '[chunkhash].' : ''}js`,
        publicPath: '/static/admin/'
    }
}

mix.webpackConfig(config)
    .options({
        extractVueStyles: false,
    })
    .setResourceRoot('/static/admin')
    .setPublicPath('public/static/admin')
    .js('resources/js/admin/main.js', 'public/static/admin/js/admin.js')
    .version();

if (mix.inProduction()) {
    mix.disableNotifications();
} else {
    mix.sourceMaps();
}
