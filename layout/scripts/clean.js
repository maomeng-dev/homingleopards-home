let fs = require('fs');
let path = require('path');
let rimraf = require('rimraf');

let _config = require('../config/_config');

rimraf(path.resolve(_config.distRoot, 'js'), ()=>(
    console.log(('Clean js build file success!'))
));
rimraf(path.resolve(_config.distRoot, 'css'), ()=>(
    console.log(('Clean css build file success!'))
));