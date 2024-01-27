import React, { useState } from 'react'
import './css/Content.css'
import { FaTrashCan } from "react-icons/fa6";

const Content = ({items}) => {


    const handelClick = (id) =>{
        console.log(`key = ${id}`)
    }
  return (
    <main>
        <ul>
            {items.map((item) =>(
                <li key={item.id}>
                    <input 
                    type='checkbox' 
                    onChange={() => handelClick(item.id)}
                    checked={item.checked}
                    />
                   <label>{item.item} </label> 
                   <FaTrashCan />
                </li>
            ))}
        </ul>
    </main>
  )
}

export default Content