const path = require('path');
// const glob = require('glob');
const webpack = require('webpack');
// const PATHS = { src: path.join(__dirname, 'src') };
// const HtmlWebPackPlugin = require('html-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
// const PurgeCssPlugin = require('purgecss-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
// const WorkboxPlugin = require('workbox-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');


module.exports = {
    entry: {
        landing: { import: './src/js/landing.js' },
        users: { import: './src/js/users.js' },
        design: { import: './src/js/design.js' },
    },
    output: {
        filename: 'js/[name].js',
        chunkFilename: 'js/[name].js',
        publicPath: '',
        path: path.resolve(__dirname, 'public'),
    },
    plugins: [
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({ filename: 'css/[name].css', chunkFilename: 'css/[id].css' }),
        // new HtmlWebPackPlugin({ template: './src/index.html', filename: './index.html', chunks: ['index'] }),
        // new PurgeCssPlugin({ paths: glob.sync(`${PATHS.src} /**//*`, { nodir: true}) }),
        // new WorkboxPlugin.GenerateSW({ clientsClaim: true, skipWaiting: true }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
        }),
        new CopyPlugin([
            { from: 'src/.htaccess', to: '[name].[ext]' },
            { from: 'src/favicon.ico', to: '[name].[ext]' },
            { from: 'src/*.php', to: '[name].[ext]' },
            { from: 'src/*.txt', to: '[name].[ext]' },
        ]),
    ],
    optimization: {
        runtimeChunk: 'single',
        splitChunks: {
            cacheGroups: {
                vendors: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'vendors',
                    chunks: 'all',
                },
            },
        },
        minimizer: [new OptimizeCSSAssetsPlugin({})],
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: 'babel-loader',
            },
        }, {
            test: /\.css$/,
            use: [
                MiniCssExtractPlugin.loader,
                {
                    loader: 'css-loader',
                    options: {
                        // url: false,
                    },
                },
            ],
        }, {
            test: /\.s[ac]ss$/,
            use: [
                MiniCssExtractPlugin.loader,
                {
                    loader: 'css-loader',
                    options: {
                        // url: false,
                    },
                },
                'sass-loader',
            ],
        }, {
            test: /\.html$/,
            use: {
                loader: 'html-loader',
                options: {
                    minimize: false,
                },
            },
        }, {
            test: /\.(png|svg|jpg|jpeg|gif|bmp)$/,
            use: [{
                loader: 'file-loader',
                options: {
                    name: 'img/[name].[ext]',
                },
            }, {
                loader: 'image-webpack-loader',
                options: {
                    bypassOnDebug: true,
                    disable: true,
                    mozjpeg: {
                        progressive: true,
                        quality: 65
                    },
                    pngquant: {
                        quality: [0.65, 0.90],
                        speed: 4
                    },
                },
            }],
        }, {
            test: /\.(woff|woff2|eot|ttf|otf)$/,
            use: [{
                loader: 'file-loader',
                options: {
                    name: 'fonts/[name].[ext]',
                },
            }],
        }, {
            test: /\.(csv|tsv)$/,
            use: [
                'csv-loader',
            ],
        }, {
            test: /\.xml$/,
            use: [
                'xml-loader',
            ],
        }],
    },
}
