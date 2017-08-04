import Demodule from './demodule.module';

let pageModule = Object.assign({
    name: 'index2',
    module: Demodule
}, {'test': 'meow2'});

console.log(pageModule);
