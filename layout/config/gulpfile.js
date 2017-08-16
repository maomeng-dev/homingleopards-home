let fs = require('fs');
let path = require('path');
let http = require('http');

let gulp = require('gulp');
let gutil = require('gulp-util');
let watch = require('gulp-watch');
let stylus = require('gulp-stylus');
let less = require('gulp-less');
let cleanCSS = require('gulp-clean-css');
let runSequence = require('run-sequence');
let webpack = require('webpack');

let _config = require('./_config');

let currentModifiedJs = null;
gulp.task('dev:build-js', () => {
    delete require.cache[require.resolve('./webpack.config.js')];
    let webpackDevConfig = require('./webpack.config.js');
    webpack(webpackDevConfig).run((err, stats) => {
        if (err) throw new gutil.PluginError('dev:build-js', err);
        gutil.log('[dev:build-js]', stats.toString({
            colors: true
        }));
    });
});

gulp.task('prod:build-js', () => {
    delete require.cache[require.resolve('./webpack.config.js')];
    let webpackProdConfig = require('./webpack.config.js');
    webpackProdConfig.map((item) => (Object.assign(item, {
        plugins: [
            new webpack.optimize.UglifyJsPlugin()
        ]
    })));
    webpack(webpackProdConfig).run((err, stats) => {
        if (err) throw new gutil.PluginError('prod:build-js', err);
        gutil.log('[prod:build-js]', stats.toString({
            colors: true
        }));
    });
});

gulp.task('dev:build-css', () => {
    gulp.src(path.join(_config.srcRoot, 'css', '**', '*.less'))
        .pipe(less())
        .pipe(gulp.dest(path.join(_config.distRoot, 'css')));

    gulp.src(path.join(_config.srcRoot, 'css', '**', '*.styl'))
        .pipe(stylus())
        .pipe(gulp.dest(path.join(_config.distRoot, 'css')));

    gulp.src(path.join(_config.srcRoot, 'css', '**', '*.css'))
        .pipe(gulp.dest(path.join(_config.distRoot, 'css')));
});

gulp.task('prod:build-css', () => {

    gulp.src(path.join(_config.srcRoot, 'css', '**', '*.less'))
        .pipe(less())
        .pipe(cleanCSS())
        .pipe(gulp.dest(path.join(_config.distRoot, 'css')));

    gulp.src(path.join(_config.srcRoot, 'css', '**', '*.styl'))
        .pipe(stylus())
        .pipe(cleanCSS())
        .pipe(gulp.dest(path.join(_config.distRoot, 'css')));

    gulp.src(path.join(_config.srcRoot, 'css', '**', '*.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(path.join(_config.distRoot, 'css')));
});

gulp.task('watch', ['dev:build-js', 'dev:build-css'], () => {
    watch(path.join(_config.srcRoot, 'js', '**', '*.js'), (modifiedJs) => {
        currentModifiedJs = modifiedJs;
        runSequence(['dev:build-js']);
    });
    watch(path.join(_config.srcRoot, 'css', '**', '*.less'), () => {
        runSequence(['dev:build-css']);
    });
    watch(path.join(_config.srcRoot, 'css', '**', '*.styl'), () => {
        runSequence(['dev:build-css']);
    });
    watch(path.join(_config.srcRoot, 'css', '**', '*.css'), () => {
        runSequence(['dev:build-css']);
    });
});

gulp.task('dev', ['watch', 'server']);

gulp.task('prod', ['prod:build-js', 'prod:build-css']);

gulp.task('server', () => {
    http.createServer((request, response) => {
        let filePath = _config.devRoot + url.parse(request.url).pathname;

        let extname = String(path.extname(filePath)).toLowerCase();
        let contentType = 'text/html';
        let mimeTypes = {
            '.html': 'text/html',
            '.js': 'text/javascript',
            '.css': 'text/css',
            '.json': 'application/json',
            '.png': 'image/png',
            '.jpg': 'image/jpg',
            '.gif': 'image/gif',
            '.wav': 'audio/wav',
            '.mp4': 'video/mp4',
            '.woff': 'application/font-woff',
            '.ttf': 'application/font-ttf',
            '.eot': 'application/vnd.ms-fontobject',
            '.otf': 'application/font-otf',
            '.svg': 'image/svg+xml'
        };

        contentType = mimeTypes[extname] || 'application/octet-stream';

        fs.readFile(filePath, (error, content) => {
            if (error) {
                console.log('[' + error.code + '] request ', request.url);
                response.writeHead(500);
                response.end(JSON.stringify(error));
            } else {
                console.log('[ACCESS] request ', request.url);
                response.writeHead(200, {'Content-Type': contentType});
                response.end(content, 'utf-8');
            }
        });
    }).listen(_config.devPort);

    setTimeout(() => {
        console.log('\n[LOG]', 'Start serving file "' + _config.devRoot + '" => "http://localhost:' + _config.devPort + '/"', '\n');
    }, 0)
});
