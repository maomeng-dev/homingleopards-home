import Demodule from './demodule.module';

let pageModule = Object.assign({
    name: 'index1',
    module: Demodule
}, {'test': 'meow'});

console.log(pageModule);
