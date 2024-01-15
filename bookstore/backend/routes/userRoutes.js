const express = require('express')
const router = express.Router()
const usersController = require('../controllers/userControllers')
router.route('/')
      .get(usersController.getAllUsers)
      .get(usersController.getUserById)
      .post(usersController.createNewUser)
      .patch(usersController.updateUser)
      .delete(usersController.deleteUser)

 module.exports = router     