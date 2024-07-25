Full-Stack Product Marketplace Application

Welcome to the Full-Stack Product Marketplace Application! This project demonstrates a full-stack e-commerce platform featuring a modern frontend, robust backend, and integrated functionalities.



Table of Contents

Overview
Part 1: Frontend Development
a: Requirements
b: Setup Instructions
c: Commands
Part 2: Backend Development
a: Requirements
b: Setup Instructions
c: Commands



Overview
This project is designed as a full-stack application to showcase advanced web development skills. It includes:



Frontend: A modern, interactive UI built with React.js.
Backend: A Laravel PHP API handling authentication, product management, and other functionalities.



Part 1: Frontend Development

Requirements

1. Framework: Vue.js or React.js
   
2. Features:
- Real-time product filtering with a search bar
- Product details displayed in a modal or separate page
- JWT-based user authentication (login/register)
- Wishlist functionality for authenticated users
- Shopping cart with add/remove products and checkout
- Responsive design using Vuetify (Vue.js) or Material-UI (React.js)
- JSON-based data storage and display


  
Setup Instructions

- Navigate to the Frontend Directory
cd frontend

- Install Dependencies
npm install

- Run the Application
npm start

The application will be available at http://localhost:3000.



Commands

- Start Development Server:
npm start

- Build for Production:
npm run build



Part 2: Backend Development

Requirements

1. Framework: Laravel PHP
   
2. Features:
   
- JWT-based user authentication
- API endpoints for product management (CRUD operations)
- Wishlist functionality for authenticated users
- Shopping cart management (add/remove products, checkout)
- (Optional) Payment gateway integration
- MySQL for database storage


  
Setup Instructions

- Navigate to the Backend Directory
cd backend

- Install Dependencies
composer install

- Configure Environment
cp .env.example .env

- Generate Application Key
php artisan key:generate

- Run Migrations
php artisan migrate

- Start the Server
php artisan serve

The backend API will be accessible at http://localhost:8000.



Commands

- Start Laravel Development Server:

php artisan serve

- Run Migrations:

php artisan migrate

- Seed Database (if applicable):

php artisan db:seed



Additional Information

- Frontend Directory: Contains the source code for the React.js or Vue.js application.
- Backend Directory: Contains the Laravel PHP application code.
- Database: Uses MySQL for data storage and retrieval.
