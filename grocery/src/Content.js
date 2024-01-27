import './css/Content.css'
import { FaTrashAlt } from "react-icons/fa";

const Content = ({items,handleChecked, handleDelete}) => {


    const handelClick = (id) =>{
        console.log(`key = ${id}`)
    }

  return (
    <main>
        {items.length ?(
        <ul>
            
            {items.map((item) =>(
                <li key={item.id} >
                    <input 
                    type='checkbox' 
                    onChange={() => handleChecked(item.id)}
                    checked={item.checked}
                    />
                   <label 
                   style={(item.checked) ?{textDecoration:'line-through'}:null}
                   onDoubleClick={() => handleChecked(item.id)}>
                    {item.item}
                    </label> 
                   <FaTrashAlt 
                        onClick = {() => handleDelete(item.id)}
                        role='button'
                        tabIndex="0"
                       

                   />
                </li>
            ))}
        </ul>
        ):"No item"}
    </main>
  )
}

export default Content