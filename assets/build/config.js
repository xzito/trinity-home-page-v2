const path = require('path');
const { argv } = require('yargs');
const { merge } = require('webpack-merge');

const rootPath = process.cwd();
const isProduction =
  !!(process.env.NODE_ENV && (process.env.NODE_ENV == 'production'));

let config = {
  entry: {
    main: [
      './main.js',
      './main.scss',
    ],
  },
  paths: {
    root: path.join(rootPath),
    assets: path.join(rootPath, 'assets'),
    dist: path.join(rootPath, 'dist'),
  },
  enabled: {
    sourceMaps: !isProduction,
    optimize: isProduction,
  },
}

module.exports = merge(config, {
  env: Object.assign(
    { production: isProduction, development: !isProduction },
    argv.env,
  ),
});
