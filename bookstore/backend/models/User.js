const mongoose = require("mongoose");
const userSchema = mongoose.Schema(
    {
        username:{
            type:String,
            required:true
        },
        password:{
            type:String,
            required:true
        },
        roles: [{ 
            type: String,
            dafault: "Employee"
        }],
        active: {
            type: Boolean,
            dafault: true
        }
    }
)

module.exports = User = mongoose.model('User',userSchema)