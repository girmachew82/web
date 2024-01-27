import React from 'react'
import './css/Footer.css'
const Footer = ({items}) => {
    const date = new Date();
  return (
    <footer> 
        {items.length}{items.length !== 1 ? " items" :" item" }&nbsp;
        &copy;{date.getFullYear()}
        </footer>
  )
}

export default Footer