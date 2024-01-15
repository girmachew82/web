require('dotenv').config()
const express = require('express')
const app = express()
const path = require('path')
const PORT = process.env.PORT || 3500
const connectDB = require('./config/dbConn')
const mongoose = require('mongoose')
const errorHandler = require('./middleware/errorHandler')
const {logger, logEvents} = require('./middleware/logger')
const cookieParser = require('cookie-parser')
const cors = require('cors')
const corsOptions = require('./config/corsOptions')
console.log(process.env.NODE_ENV)
connectDB()
app.use(logger)
app.use(express.json())
app.use(cookieParser())
app.use(cors(corsOptions))
app.use(function(req, res, next) { // kolpa magkiorika poy de ta kserw
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Headers, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization");
    res.header('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, PATCH, OPTIONS');
    next();
});
app.use('/',express.static(path.join(__dirname,'public')))
app.use('/',require('./routes/root'))
app.use('/users', require('./routes/userRoutes'))
app.use('/books', require('./routes/booksRoute'))
app.all('*',(req,res)=>{
    res.status(404)
    if(req.accepts('html')){
        res.sendFile(path.join(__dirname,'views','404.html'))
     }else if(req.accepts('json')){
        res.json({message:"404 not found"})
     }else{
        res.type('txt').send('404 not found')
     }
})
app.use(errorHandler)
mongoose.connection.once('open',()=>{
    console.log('App connected to database')
    app.listen(PORT,()=>{
    console.log(`Server is running on port ${PORT}`)
})
})
mongoose.connection.on('error',err =>{
    console.log(err)
    logEvents(`${err.no}: ${err.code}\t${err.syscall}\t${err.hostname}`,'mongoErrLog.log')
})
