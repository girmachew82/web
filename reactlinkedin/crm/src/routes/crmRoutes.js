import { addNewContact } from "../controllers/cmrController"

const routes =(app) =>{

    app.route('/contact')
    .get((req,res, next)=>{
         //middleware 
    console.log(`Request form: ${req.originalUrl}`)
    console.log(`Request type: ${req.method}`)
    next();
    },(req, res, next) =>
     res.send('GET request succeful!')
    )
    .post(addNewContact);
    
    app.route('/contact/:contactId')
    .put((req,res)=>
    res.send('PUT request succeful!')
  )
  .delete((req,res)=>
  res.send('DELETE request succeful!')
)

}
export default routes;