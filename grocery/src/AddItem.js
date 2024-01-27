import React from 'react'
import { CiCirclePlus } from "react-icons/ci";
const AddItem = ({newItem, setNewItem, handleSubmit}) => {
  return (
    <form className='addForm' onSubmit={handleSubmit}>
        <label htmlFor='addItem'>Add Item</label>
        <input 
            autoFocus
            id ="addItem"
            type = "text"
            placeholder='Add Item'
            required
            value={newItem}
            onChange={(e) => setNewItem(e.target.value)}
            />
            <button 
                type='submit'
                aria-label='Add Item'>
                    <CiCirclePlus/>
                </button>
    </form>
  )
}

export default AddItem