# LYBRARIE

> Lybrarie is the city's favorite bookshop

## Made with

-   [php >= 7.3](https://www.php.net/)
-   [laravel 8.12](https://laravel.com)
-   [spatie/laravel-medialibrary 8.0.0](https://docs.spatie.be/laravel-medialibrary/v7/introduction/)

## Features

-   Admin Role (CRUD) [
    Users,
    Roles,
    Plans,
    Genre,
    Authors,
    Books
    ]
-   User Library
-   Filter by Authors - Done
-   Search by title, isbn Author - Partially Done
-   Filter by Genre - Not Done

## Installation

-   Check for requirements [laravel](https://laravel.com/docs/8.x/installation#server-requirements)

```git
# Clone this repository in your root folder
git clone

# Install dependencies
componser install

# Navigate to the lybrarie folder
cd lybrarie

# Create file .env
cp .env.example .env

# Generate key
php artisan key:generate

# Generate symbolic link
php artisan storage:link

# Run migrations (tables and Seeders)
php artisan migrate --seed

# Create Server
php artisan serve

# Access to project in your browser
http://localhost:8000

# Admin account
hi@epareto.com
password
```

#
