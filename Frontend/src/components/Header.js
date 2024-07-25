// src/components/Header.js
import React from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { removeToken } from '../utils/auth'; // Import removeToken

function Header() {
  const navigate = useNavigate();

  const handleLogout = () => {
    removeToken(); // Remove token on logout
    navigate('/login'); // Redirect to login page
  };

  return (
    <nav>
      <Link to="/">Home</Link>
      <Link to="/login">Login</Link>
      <Link to="/register">Register</Link>
      <button onClick={handleLogout}>Logout</button>
    </nav>
  );
}

export default Header;
