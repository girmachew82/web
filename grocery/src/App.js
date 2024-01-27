import AddItem from './AddItem';
import './App.css';
import Content from './Content';
import Footer from './Footer';
import Header from './Header';
import { useState } from 'react';
function App() {
  const [items, setItems] = useState(JSON.parse(localStorage.getItem("shoppingList")))
const setAndSaveItems = (newItems) => {
  setItems(newItems)
  localStorage.setItem("shoppingList", JSON.stringify(newItems))
}
const [newItem, setNewItem] = useState('')
const handleChecked = (id) =>{
  const listItems = items.map((item) => item.id === id ? {...item, checked: !item.checked}:item)
  setAndSaveItems(listItems)
}
const handleDelete = (id) =>{
  const listItems = items.filter((item) => item.id !== id )
setAndSaveItems(listItems)
}
const addItem = (item) => {
  const id = items.length ? items[items.length -1].id + 1 : 1
  const myNewItem = { id, checked:false, item}
  const listItems = [...items, myNewItem]
  setAndSaveItems(listItems)
}
const handleSubmit  = (e) =>{
e.preventDefault()
if(!newItem)
    return 
addItem(newItem)
setNewItem('')
}
  return (
    <div className="App">
      <Header/>
      <AddItem 
          newItem ={newItem}
          setNewItem ={setNewItem}
          handleSubmit = {handleSubmit}
      />
      <Content 
       items={items}
       handleChecked={handleChecked}
       handleDelete ={handleDelete}
       />
      
      <Footer items= {items}/>
    </div>
  );
}

export default App;
