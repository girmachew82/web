import './css/Content.css'
import { FaTrashCan } from "react-icons/fa6";

const Content = ({items,handleChecked}) => {


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
                    onChange={() => handleChecked(item.id)}
                    checked={item.checked}
                    />
                   <label 
                   onDoubleClick={() => handleChecked(item.id)}>
                    {item.item} 
                    </label> 
                   <FaTrashCan onClick={() => handelClick(item.id)}/>
                </li>
            ))}
        </ul>
    </main>
  )
}

export default Content