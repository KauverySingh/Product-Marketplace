import jwt_decode from 'jwt-decode';

export const getToken = () => localStorage.getItem('token');
export const setToken = (token) => localStorage.setItem('token', token);
export const removeToken = () => localStorage.removeItem('token');
export const getUser = () => {
  const token = getToken();
  return token ? jwt_decode(token) : null;
};
