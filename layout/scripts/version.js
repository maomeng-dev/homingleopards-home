let fs = require('fs');

let _config = require('../config/_config');

let currentVersion = ((new Date()).getTime() / 1000).toFixed(0);

fs.writeFile(`${_config.projectRoot}/VERSION.txt`, currentVersion, function (err) {
    if (err) {
        return console.log(err);
    }

    console.log(`Current version: [${currentVersion}].`);
});