<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

# Madura Mart Project Documentation

## About Madura Mart

**Madura Mart** is a comprehensive supply chain and inventory management system built with Laravel. It manages the complete lifecycle of products from distribution to sales, enabling businesses to track purchases, inventory, orders, and deliveries efficiently.

The system streamlines operations for distributors, product management, customer ordering, and sales tracking while maintaining complete visibility across the entire supply chain.

## Project Overview

✅ **Project Overview** - Clear description of your supply chain management system
✅ **Key Features** - All 9 major features your system provides
✅ **Technology Stack** - Laravel 12, PHP 8.2+, Tailwind CSS, Vite
✅ **All 12 Models** - Listed with their purposes
✅ **Installation Guide** - Complete setup instructions with composer script
✅ **Running Instructions** - Development, production, and queue commands
✅ **Database Design** - Overview of your relational structure
✅ **Development Section** - Artisan commands and frontend development
✅ **Project Layout** - Directory structure explanation

## Key Features

- **User Authentication & Authorization** - Secure login and registration system with role-based access
- **Distributor Management** - Track and manage distributor information and operations
- **Product Inventory** - Complete product catalog with stock tracking, pricing, and expiry date management
- **Purchase Management** - Record and track purchases from distributors with detailed line items
- **Customer Orders** - Process customer orders with order details and tracking
- **Sales Management** - Record sales transactions with comprehensive sales details
- **Delivery Tracking** - Monitor product deliveries throughout the supply chain
- **Expedition Management** - Manage shipping and logistics operations
- **Dashboard** - Central hub for accessing all system features

## Technology Stack

- **Framework**: Laravel 12.x
- **PHP Version**: 8.2+
- **Frontend**: Tailwind CSS 4.0, Vite
- **Database**: Migrations-based schema management
- **Build Tool**: Vite with Laravel Vite Plugin
- **Testing**: PHPUnit 11.x

## Core Models (12 Models)

- `User` - System users and authentication
- `Product` - Product inventory management
- `Distributor` - Distributor information
- `Purchase` - Purchase records from distributors
- `PurchaseDetail` - Individual line items for purchases
- `Order` - Customer orders
- `OrderDetail` - Individual line items for orders
- `Sale` - Sales transactions
- `SaleDetail` - Individual line items for sales
- `Customer` - Customer information
- `Delivery` - Delivery tracking
- `Expedition` - Shipping and logistics

## Installation Guide

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & npm
- Laravel Sail (optional) or a local development environment

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd madura_mart
   ```

2. **Run the setup script**
   ```bash
   composer run setup
   ```

   This will:
   - Install PHP dependencies
   - Create `.env` file
   - Generate application key
   - Run database migrations
   - Install Node dependencies
   - Build frontend assets

3. **Manual Alternative Setup**
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate
   npm install
   npm run build
   ```

## Running Instructions

### Development Mode
```bash
composer run dev
```

This runs Laravel server, queue listener, and Vite dev server concurrently.

### Production Build
```bash
npm run build
php artisan serve
```

### Queue Processing
```bash
php artisan queue:listen --tries=1
```

## Database Design

The system uses a relational database structure:
- **Users and authentication cache** - System user management
- **Distributors and products** - Supplier and inventory data
- **Purchase and order management** - Incoming and outgoing transactions
- **Sales transactions** - Revenue tracking
- **Delivery and expedition tracking** - Logistics management

### Migrations
- Users and authentication cache
- Distributors and products
- Purchase and order management
- Sales transactions
- Delivery and expedition tracking

Run migrations with:
```bash
php artisan migrate
```

Rollback with:
```bash
php artisan migrate:rollback
```

## Development Section

### Artisan Commands

Common Artisan commands for development:
```bash
php artisan tinker              # Interactive shell
php artisan make:model Name     # Create new model
php artisan make:migration name # Create migration
php artisan make:controller Name # Create controller
```

### Frontend Development

Vite is configured for fast development and optimized production builds:
```bash
npm run dev      # Start development server
npm run build    # Production build
```

Tailwind CSS is included for styling.

## Project Layout

```
├── app/
│   ├── Models/          # Eloquent models (12 models)
│   ├── Http/
│   │   └── Controllers/ # Route controllers
│   └── Providers/       # Service providers
├── database/
│   ├── migrations/      # Database migrations
│   ├── factories/       # Model factories for testing
│   └── seeders/         # Database seeders
├── resources/
│   ├── views/           # Blade templates
│   ├── css/             # Stylesheets
│   └── js/              # JavaScript
├── routes/              # Application routes
├── config/              # Configuration files
└── public/              # Public assets
```

## Testing

Run the test suite with:
```bash
composer run test
```

This clears config cache and runs all tests in the `tests/` directory.

## Authentication

The application uses Laravel's built-in authentication system:
- User registration at `/register`
- Login at `/login`
- Protected routes require `auth` middleware
- Logout functionality with `logout` route

## Routes Overview

- **Authentication**: Login, Register, Logout
- **Resources**: Distributors, Products
- **Dashboard**: Central management interface
- **Testing**: Test routes


