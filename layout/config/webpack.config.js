let fs = require('fs');
let path = require('path');

let _config = require('./_config'),
    _common = require('./webpack.common');

let jsSrcRoot  = path.resolve(_config.srcRoot, 'js'),
    jsDistRoot = path.resolve(_config.distRoot, 'js');

function makeCompiler(name, entryConfig) {
    if ((typeof entryConfig === 'undefined') || (Object.keys(entryConfig).length === 0)) {
        return;
    }

    return Object.assign({
        entry: (() => {
            let result = {};

            for (let key in entryConfig) {
                if (entryConfig.hasOwnProperty(key)) {
                    result[key] = path.join(jsSrcRoot, name, entryConfig[key]);
                }
            }
            return result;
        })(),
        output: {
            path: path.resolve(jsDistRoot, name),
            filename: '[name].js'
        }
    }, _common);
}

let compilerList = [],
    pageList     = fs.readdirSync(jsSrcRoot);

pageList.forEach((pageName) => {
    let pageRoot = path.join(jsSrcRoot, pageName),
        pageStat = fs.statSync(pageRoot);

    if (pageStat.isDirectory()) {
        let pageScript = fs.readdirSync(pageRoot);

        if (pageScript.length) {
            let compiler = makeCompiler(
                pageName,
                (() => {
                    let result = {};
                    pageScript.forEach((scriptName) => {
                        if (_config.buildAll || (scriptName.match(/\.module\.js$/gi) === null)) {
                            result[scriptName.replace(/^(.+?)\..*$/g, '$1')] = scriptName;
                        }
                    });
                    return result;
                })()
            );

            if (compiler) {
                compilerList.push(compiler);
            }
        }
    }
});

module.exports = compilerList;