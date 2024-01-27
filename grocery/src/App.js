import './App.css';
import Content from './Content';
import Footer from './Footer';
import Header from './Header';
import { useState } from 'react';
function App() {
  const [items, setItems] = useState([
    {
        id: 1,
        checked :true,
        item: "Pizza"
    },
    {
        id: 2,
        checked :false,
        item: "Milk"
    },
    {
        id: 3,
        checked :false,
        item: "Bread"
    },
])
const handleChecked = (id) =>{
  const listItems = items.map((item) => item.id === id ? {...item, checked: !item.checked}:item)
  setItems(listItems)
}
  return (
    <div className="App">
      <Header/>
      <Content items={items}
       handleChecked={handleChecked}
       />
      <Footer items= {items}/>
    </div>
  );
}

export default App;
