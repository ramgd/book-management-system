# Book Management System

A complete book management system with JWT authentication and Blade UI built with Laravel 12.

## Features

- JWT Authentication (Register/Login/Profile)
- Complete Book CRUD operations
- Search functionality
- Pagination
- Soft delete
- Input validation
- SQL injection prevention
- Blade UI with Tailwind CSS
- RESTful API endpoints
- Postman collection included

## Requirements

- PHP >= 8.2
- Composer
- MySQL >= 5.7
- Laravel 12

## Installation Steps

1. Clone the repository:
```bash
git clone <repository-url>
cd book-management-system






# ============================================
# Book Management System

A complete Book Management System with JWT Authentication and Blade UI built with Laravel 12.

## Features

-  JWT Authentication (Register/Login/Profile)
-  Complete Book CRUD Operations
-  Web Interface (Blade + Tailwind CSS)

-  RESTful API (Postman Compatible)

-  Search & Pagination
-  Soft Delete

-  Input Validation
-  MVC Architecture

## System Requirements

- PHP >= 8.2
- Composer
- MySQL >= 5.7
- Node.js (Optional, for frontend)

## Complete Setup Commands

# 
- project folder

- book-management-system

# creating new project
composer create-project laravel/laravel book-management-system
cd book-management-system





# Install dependencies and run the project


composer install

composer require tymon/jwt-auth

composer require firebase/php-jwt

php artisan key:generate


php artisan migrate:fresh


php artisan migrate


php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

php artisan jwt:secret




# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
php artisan optimize

# Clear compiled views
php artisan view:cache

# Clear routes cache
php artisan route:cache

# Clear config cache
php artisan config:cache







# Start project 

# Start server
php artisan serve

