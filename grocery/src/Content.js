import ItemList from './ItemList';
import './css/Content.css'

import React from 'react';
const Content = ({items,handleChecked, handleDelete}) => {

  return (
    <main>
        {items.length ?(
       <ItemList
            items={items}
            handleChecked={handleChecked}
            handleDelete ={handleDelete}
       />
        ):"No item"}
    </main>
  )
}

export default Content