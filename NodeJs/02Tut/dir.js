const fs = require('fs')
//Check and create directory
if(!fs.existsSync('./new')){
    fs.mkdir('./new',(err)=>{
        if(err) throw err;
        console.log('Directory created')
    })
}
///delete directory 
if(fs.existsSync('./new')){
    fs.rmdir('./new',(err)=>{
        if(err) throw err;
        console.log('Directory removed')
    })
}