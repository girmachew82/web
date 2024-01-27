import React from 'react'
import { FaTrashAlt } from "react-icons/fa";
const ItemList = ({items,handleChecked, handleDelete}) => {
  return (
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
  )
}

export default ItemList