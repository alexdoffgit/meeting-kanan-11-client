const mix = require('laravel-mix');

let fs  = require('fs');

let getFiles = function (dir) {
    // get all 'files' in this directory
    // filter directories
    return fs.readdirSync(dir).filter(file => {
        return fs.statSync(`${dir}/${file}`).isFile();
    });
};

getFiles('resources/js').forEach(function (JSpath) {
    if(JSpath !== 'global.js' || JSpath !== 'app.js' ){ //Do not mix 'global.js' and 'app.js'
        mix.js('resources/js/' + JSpath, 'public/js');
    }

});


getFiles('resources/css').forEach(function (SASSpath) { 
    mix.css('resources/css/' + SASSpath, 'public/css');
});
