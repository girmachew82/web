import React from 'react'
import './css/Footer.css'
const Footer = () => {
    const date = new Date();
  return (
    <footer> &copy;{date.getFullYear()}</footer>
  )
}

export default Footer