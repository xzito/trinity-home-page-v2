const path = require('path');
const { argv } = require('yargs');
const { merge } = require('webpack-merge');

const rootPath = process.cwd();
const isProduction = !!((argv.env && argv.env.production) || argv.p);

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

if (process.env.NODE_ENV === undefined) {
  process.env.NODE_ENV = isProduction ? 'production' : 'development';
}
