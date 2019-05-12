const mix = require('laravel-mix')
const cleanWebpackPlugin = require('clean-webpack-plugin');
const webpack = require('webpack');
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

let config = {
    plugins: [
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
        new cleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                path.resolve(__dirname + '/public/{css,chunk,js}/*')
            ],
            verbose: true
        })
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            '@assets': path.resolve(__dirname, 'resources/js/assets'),
            '@comp': path.resolve(__dirname, 'resources/js/components'),
            '@views': path.resolve(__dirname, 'resources/js/views'),
            '@layout': path.resolve(__dirname, 'resources/js/layout'),
            '@static': path.resolve(__dirname, 'resources/js/static')
        }
    },
    module: {
        rules: [
            {
                test: /\.less$/,
                loader: require.resolve('less-loader'), // compiles Less to CSS
                options: {
                    javascriptEnabled: true
                }
            }
        ],
    }
};

mix
    .options({extractVueStyle: true})
    // .js('resources/js/prism.js', 'public')
    .extract([
        'ant-design-vue',
        'vue',
        'vue-router',
        'axios'
    ])
    .setPublicPath('public')
    .less('resources/less/prism.less', 'public')
    .webpackConfig(config)
    .copy('public', '../public/vendor/prism')
    .version();
