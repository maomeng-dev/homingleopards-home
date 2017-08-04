let chalk = require('chalk'),
    log   = console.log;

function logBlock(name, ...desc) {
    log(chalk.blue('### `' + name + '`'));
    desc.forEach((line) => (
        log(chalk.cyan('> ' + line))
    ));
    log('\n');
}

/* Log hello */
log(chalk.red(
    '\n' +
    '===========\n' +
    '# README : \n' +
    '===========\n'
));

/* Log scripts */
log(chalk.green(
    '## Scripts : \n'
));

logBlock(
    'help',
    'Start the README.'
);

logBlock(
    'start',
    'Alias of command `help`. Start the README.'
);


logBlock(
    'dev',
    'Build and Watch static files, then boot a node server to host files in dist directory.'
);

logBlock(
    'prod',
    'Build minify static files to dist directory.'
);

logBlock(
    'server',
    'Start a node server to host files in dist directory.'
);

logBlock(
    'clean',
    'Remove js/ & css/ in dist directory.'
);

logBlock(
    'build',
    'Use yarn to install all dependencies, and run `clean` & `prod` scripts.'
);

logBlock(
    'deploy',
    'CD to online directory, pull the source code from remote, then makefile and ship it online.'
);

/* Log configs */
log(chalk.green(
    '## Configs : \n'
));

logBlock(
    'srcRoot',
    'Source files directory.'
);

logBlock(
    'distRoot',
    'Distributable files directory.'
);

logBlock(
    'srcRoot',
    'Source directory of static files.'
);
logBlock(
    'devRoot',
    'Node server will host this directory.'
);

logBlock(
    'devPort',
    'Node server will listen this port.'
);

logBlock(
    'buildAll',
    '`true` : Will build all files while watching.',
    '`false` : Will build modified files while watching.'
);