const User = require('../models/User')
const Note = require('../models/Note')
const asyncHandler = require('express-async-handler')
const bcrypt = require('bcrypt')
const { default: mongoose } = require('mongoose')

// @desc Get all Users
// @route GET /users
// @access private

const getAllUsers = asyncHandler(async (req, res)=>{
        const users = await User.find().select('-password').lean()
        if(!users || !users.length){
            return res.status(400).json({message:"No users found"})
        }
        res.json(users)
})
// @desc Get all Users
// @route GET /users
// @access private

const getUserById = asyncHandler(async (req, res)=>{
    const { id } = id.param
    const user = await User.findById(id)
    if(!user){
        return res.status(400).json({message:"No user found"})
    }
    res.json(user)
})
// @desc create a new user
// @route POST /users
// @access private

const createNewUser = asyncHandler(async (req, res)=>{
    const { username, password, roles } = req.body

    // Confirm data
    if (!username || !password ) {
        return res.status(400).json({ message: 'All fields are required' })
    }

    // Check for duplicate username
    const duplicate = await User.findOne({ username }).collation({ locale: 'en', strength: 2 }).lean().exec()

    if (duplicate) {
        return res.status(409).json({ message: 'Duplicate username' })
    }

    // Hash password 
    const hashedPwd = await bcrypt.hash(password, 10) // salt rounds

    const userObject = (!Array.isArray(roles) || !roles.length)
        ? { username, "password": hashedPwd }
        : { username, "password": hashedPwd, roles }

    // Create and store new user 
    const user = await User.create(userObject)

    if (user) { //created 
        res.status(201).json({ message: `New user ${username} created` })
    } else {
        res.status(400).json({ message: 'Invalid user data received' })
    }
})
// @desc update a user
// @route PATCH /users
// @access private
const updateUser = asyncHandler(async (req, res)=>{
    const { id, username, roles, active } = req.body

    // Confirm data 
    if (!id || !username || !Array.isArray(roles) || !roles.length || typeof active !== 'boolean') {
        return res.status(400).json({ message: 'All fields except password are required' })
    }

    // Does the user exist to update?
    const user = await User.findById(id).exec()

    if (!user) {
        return res.status(400).json({ message: 'User not found' })
    }

    // Check for duplicate 
    const duplicate = await User.findOne({ username }).collation({ locale: 'en', strength: 2 }).lean().exec()

    // Allow updates to the original user 
    if (duplicate && duplicate?._id.toString() !== id) {
        return res.status(409).json({ message: 'Duplicate username' })
    }

    user.username = username
    user.roles = roles
    user.active = active

    if (password) {
        // Hash password 
        user.password = await bcrypt.hash(password, 10) // salt rounds 
    }

    const updatedUser = await user.save()

    res.json({ message: `${updatedUser.username} updated` })
})
// @desc delete a user
// @route DELETE /users
// @access private

const deleteUser = asyncHandler(async (req, res)=>{
    /*
        const { id } = req.body
        if(!id){
            return res.status(400).json({message: "User id is required"})
        }
const notes = await Note.findOne({user:id}).lean().exec()        
if(notes?.length){
    return res.status(400).json({message:"User has assigned notes"})
}
const user = await User.findById(id).lean().exec()
if(!user){
    return res.status(400).json({message:'User not found'})
}
const result = await user.deleteOne()
//const result = await user.deleteOne()
const reply = `Username ${result.username} with ID ${result._id} deleted`
res.json(reply)
*/

const { id } = req.body

// Confirm data
if (!id) {
    return res.status(400).json({ message: 'User ID Required' })
}

// Does the user still have assigned notes?
const note = await Note.findOne({ user: id }).lean().exec()
if (note) {
    return res.status(400).json({ message: 'User has assigned notes' })
}

// Does the user exist to delete?
const user = await User.findById(id).exec()

if (!user) {
    return res.status(400).json({ message: 'User not found' })
}

const result = await user.deleteOne()

const reply = `Username ${result.username} with ID ${result._id} deleted`

res.json(reply)

})


module.exports = {getAllUsers, getUserById, createNewUser, updateUser, deleteUser}