import React from 'react'
import './css/Footer.css'
const Footer = ({items}) => {
    const date = new Date();
  return (
    <footer> 
        {items.length}{items.length !== 1 ? " items" :" items" }&nbsp;
        &copy;{date.getFullYear()}
        </footer>
  )
}

export default Footer