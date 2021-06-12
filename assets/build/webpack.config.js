'use strict';

const path = require('path');
const webpack = require('webpack');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ESLintPlugin = require('eslint-webpack-plugin');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const FriendlyErrorsPlugin = require('@soda/friendly-errors-webpack-plugin');

const config = require('./config');

let webpackConfig = {
  mode: process.env.NODE_ENV,
  context: config.paths.assets,
  entry: config.entry,
  devtool: (config.enabled.sourceMaps ? 'source-map' : undefined),
  optimization: {
    minimize: config.enabled.optimize,
  },
  output: {
    path: config.paths.dist,
    filename: '[name].js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: [/node_modules(?![/|\\](bootstrap|foundation-sites))/],
        use: [
          {
            loader: 'buble-loader',
            options: {
              objectAssign: 'Object.assign',
              transforms: {
                dangerousForOf: true,
                modules: false,
              },
            },
          },
        ],
      },
      {
        test: /\.css$/,
        include: config.paths.assets,
        use: [
          { loader: MiniCssExtractPlugin.loader },
          {
            loader: 'css-loader', options: {
              sourceMap: config.enabled.sourceMaps,
            },
          },
          {
            loader: 'postcss-loader', options: {
              sourceMap: config.enabled.sourceMaps,
            },
          },
        ],
      },
      {
        test: /\.scss$/,
        include: config.paths.assets,
        use: [
          { loader: MiniCssExtractPlugin.loader },
          {
            loader: 'css-loader', options: {
              sourceMap: config.enabled.sourceMaps,
            },
          },
          {
            loader: 'postcss-loader', options: {
              sourceMap: config.enabled.sourceMaps,
            },
          },
          {
            loader: 'sass-loader', options: {
              sourceMap: config.enabled.sourceMaps,
            },
          },
        ],
      },
      {
        test: /\.(ttf|otf|eot|woff2?|png|jpe?g|gif|svg|ico)$/,
        include: config.paths.assets,
        loader: 'url',
        options: {
          limit: 4096,
          name: '[path][name].[ext]',
        },
      },
      {
        test: /\.(ttf|otf|eot|woff2?|png|jpe?g|gif|svg|ico)$/,
        include: /node_modules/,
        loader: 'url',
        options: {
          limit: 4096,
          outputPath: 'vendor/',
          name: '[name].[ext]',
        },
      },
    ],
  },
  resolve: {
    modules: [
      config.paths.assets,
      'node_modules',
    ],
    enforceExtension: false,
  },
  externals: {
    jquery: 'jQuery',
  },
  plugins: [
    new CleanWebpackPlugin({
      root: config.paths.root,
      verbose: true,
    }),
    new CopyPlugin({
      patterns: [
        {
          from: path.join(config.paths.assets, 'images'),
          to: path.join(config.paths.dist, 'images'),
        },
      ],
    }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      Popper: 'popperjs/core/dist/umd/popper.js',
    }),
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
    new ESLintPlugin({
      failOnWarning: true,
    }),
    new StyleLintPlugin({
      failOnError: true,
      syntax: 'scss',
    }),
    new FriendlyErrorsPlugin(),
  ],
};

module.exports = webpackConfig;
