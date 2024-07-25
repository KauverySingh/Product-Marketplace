// src/components/ProtectedRoute.js
import React from 'react';
import { Navigate, useLocation } from 'react-router-dom';
import { getToken } from '../utils/auth';

function ProtectedRoute({ element: Component }) {
  const token = getToken();
  const location = useLocation();

  return token ? (
    Component
  ) : (
    <Navigate to="/login" state={{ from: location }} />
  );
}

export default ProtectedRoute;
