// src/components/Wishlist.js
import React from 'react';
import { useSelector, useDispatch } from 'react-redux';
import { removeFromWishlist } from '../redux/actions/wishlistActions';

function Wishlist() {
  const wishlistItems = useSelector((state) => state.wishlist.items);
  const dispatch = useDispatch();

  const handleRemove = (productId) => {
    dispatch(removeFromWishlist(productId));
  };

  return (
    <div>
      <h2>Wishlist</h2>
      {wishlistItems.length ? (
        <ul>
          {wishlistItems.map(item => (
            <li key={item.id}>
              <span>{item.name} - ${item.price}</span>
              <button onClick={() => handleRemove(item.id)}>Remove</button>
            </li>
          ))}
        </ul>
      ) : (
        <p>Your wishlist is empty</p>
      )}
    </div>
  );
}

export default Wishlist;
