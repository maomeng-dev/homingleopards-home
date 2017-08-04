let path = require('path');

module.exports = {
    srcRoot: path.resolve(__dirname, '..', 'src'),
    distRoot: path.resolve(__dirname, '..', 'dist'),

    devRoot: path.resolve(__dirname, '..', 'dist'),
    devPort: 9090,

    buildAll: false
};
