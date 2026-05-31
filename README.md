# Employee System — Laravel

A full Laravel 10 rewrite of the plain-PHP Employee Management System.

## Features
- User **Register** & **Login** with CSRF protection
- **Employee Dashboard** with stats (total, active, departments, avg. salary)
- **Add** and **Delete** employees
- Laravel Eloquent ORM, Blade templates, route-model binding
- Flash messages & validation errors

## Requirements
- PHP 8.1+
- Composer
- MySQL (WAMP / XAMPP / Laragon / Docker)

## Setup

### 1. Install dependencies
```bash
composer install
```

### 2. Create environment file
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Configure database in `.env`
```env
DB_DATABASE=employee_system
DB_USERNAME=root
DB_PASSWORD=          # leave blank for WAMP default
```

### 4. Run migrations + seed sample data
```bash
php artisan migrate --seed
```

### 5. Start the server on port 8080
```bash
php artisan serve --port=8080
```

Open **http://localhost:8080** in your browser.

---

## Project Structure
```
app/
  Http/
    Controllers/
      AuthController.php       ← login, register, logout
      EmployeeController.php   ← index, store, destroy
  Models/
    User.php
    Employee.php

database/
  migrations/
    ...create_users_table.php
    ...create_employees_table.php
  seeders/
    DatabaseSeeder.php         ← 3 sample employees

resources/views/
  layouts/app.blade.php
  auth/
    login.blade.php
    register.blade.php
  employees/
    index.blade.php            ← dashboard + table

routes/
  web.php                      ← all routes
```
