//import express from 'express'
const express = require('express')
//import booksController from '../controllers/booksController.js'
const booksController =require('../controllers/booksController')
const router = express.Router()
//Route 
router.route('/')
        .post(booksController.createNewBook)
        .get(booksController.getAllBooks)
        .get(booksController.getBookById)
        .put(booksController.updateById)
        .delete(booksController.deleteById)

///export default router
module.exports = router