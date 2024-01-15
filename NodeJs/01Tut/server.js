/*
how NodeJS differs form Vanilla JS
1) Node runs on a server - not in a browser(bacckend not frontend)
2) The console is the terminal window
*/
console.log("Hello Wolrd")
//3) global object instead of window object
console.log(global)
//4) Has common Core modules that we will explore
//5) CommonJS modules instead of ES6 modules
//6) Missing some vanilla JS API like fetch
const os = require('os')
const path = require('path')
//const math = require('./math')
const {add, subtract, multiply, divide} = require('./math')
/*
console.log(os.type())
console.log(os.version())
console.log(os.homedir())

console.log(__dirname) 
console.log(__filename)
console.log(path.dirname(__filename))
console.log(path.basename(__filename))
console.log(path.extname(__filename))
console.log(path.parse(__filename))
*/
console.log(5," + ",8," = ",add(5,8))
console.log(multiply(5,8))
console.log(divide(5,8))
console.log(subtract(5,8))