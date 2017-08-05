let fs = require('fs');
let path = require('path');
let rimraf = require('rimraf');

let _config = require('../config/_config');
let totalTaskCount = 0;
let completeTaskCount = 0;

function runClean(dir) {
    totalTaskCount++;
    return new Promise((resolve, reject) => {
        rimraf(path.resolve(_config.distRoot, dir), () => {
            completeTaskCount++;
            console.log(('Clean '+ dir +' build file success!'));
            resolve(completeTaskCount);
        });
    });
}

function checkTaskComplete() {
    if (completeTaskCount >= totalTaskCount) {
        console.log('Clean old build file complete!\n');
    }
}

runClean('js').then(checkTaskComplete);
runClean('css').then(checkTaskComplete);
