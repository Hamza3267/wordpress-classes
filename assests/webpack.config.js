const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

const JS_DIR = path.resolve(__dirname, 'src/js');
const IMG_DIR = path.resolve(__dirname, 'src/img');
const BUILD_DIR = path.resolve(__dirname, 'BUILD');

const entry = {
    main: `${JS_DIR}/main.js`,
    single: `${JS_DIR}/single.js`,
};

const output = {
    path: BUILD_DIR,
    filename: 'js/[name].js',
};

const rules = [
    {
        test: /\.js$/,
        include: [JS_DIR],
        exclude: /node_modules/,
        use: 'babel-loader',
    },
    {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            'sass-loader',
        ],
    },
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use: [
            {
                loader: 'file-loader',
                options: {
                    name: '[path][name].[ext]',
                    publicPath: process.env.NODE_ENV === 'production' ? '../' : '../../',
                },
            },
        ],
    },
];

const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: argv.mode === 'production',
    }),
    new MiniCssExtractPlugin({
        filename: 'css/[name].css',
    }),
];

module.exports = (env, argv) => ({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules,
    },
    optimization: {
        minimizer: [
            new CssMinimizerPlugin({
                minimizerOptions: {
                    preset: [
                        'default',
                        {
                            discardComments: {
                                removeAll: true,
                            },
                        },
                    ],
                },
            }),
            new TerserPlugin({
                parallel: true,
                terserOptions: {
                    sourceMap: argv.mode !== 'production',
                },
            }),
        ],
    },
    plugins: plugins(argv),
    externals: {
        jquery: 'jQuery',
    },
});
