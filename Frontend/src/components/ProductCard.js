// src/components/ProductCard.js
import React from 'react';
import { Button, Card, CardContent, Typography } from '@mui/material';

function ProductCard({ product, onAddToCart }) {
  return (
    <Card sx={{ maxWidth: 345, mb: 2 }}>
      <CardContent>
        <Typography variant="h5" component="div">
          {product.name}
        </Typography>
        <Typography variant="body2" color="text.secondary">
          {product.description}
        </Typography>
        <Typography variant="h6" component="div">
          ${product.price}
        </Typography>
        <Button 
          variant="contained" 
          color="primary" 
          onClick={() => onAddToCart(product)}
          sx={{ mt: 2 }}
        >
          Add to Cart
        </Button>
      </CardContent>
    </Card>
  );
}

export default ProductCard;
