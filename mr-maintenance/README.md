# Mr. Maintenance - Home Maintenance Services Platform

A full-stack, production-ready Laravel MVC web application for "Mr. Maintenance", a Home Maintenance Services platform based in Varanasi, Uttar Pradesh.

## Business Details
- **Business Name:** Mr. Maintenance
- **Tagline:** Your Trusted Home Maintenance Partner
- **Phone:** +91 8858448111
- **WhatsApp:** https://wa.me/918858448111
- **Address:** SA 4/4-3 Pandeypur Daulatpur, Varanasi, Uttar Pradesh 221002
- **Website:** www.mrmaintenance.co.in

## Prerequisites
- PHP >= 8.2
- Composer
- Node.js & npm
- SQLite / MySQL

## Setup Instructions

Follow these step-by-step commands to set up the project locally:

```bash
# 1. Clone or download the project
git clone <repository_url> mr-maintenance
cd mr-maintenance

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies and build assets
npm install
npm run build

# 4. Copy environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Configure database (by default it uses SQLite)
# If using MySQL, update .env file with DB_CONNECTION=mysql and provide DB credentials

# 7. Run migrations and seed the database
# This will create all tables and populate them with default services, AMC plans, testimonials, team members, and an admin user.
php artisan migrate:fresh --seed

# 8. Link storage (for file uploads)
php artisan storage:link

# 9. Start the development server
php artisan serve
```

## Accessing the Application

- **Public Website:** `http://localhost:8000`
- **Admin Dashboard:** `http://localhost:8000/admin/dashboard`

### Admin Login Credentials
- **Email:** `abhaypandey9425@gmail.com`
- **Password:** `password`

## Key Features Built
- Modern, fully mobile-responsive design with Custom CSS, Bootstrap 5, FontAwesome 6, and AOS animations.
- Dynamic services and AMC plans loaded from the database.
- Complete booking system with form validation, old input repopulation, custom IndianPhone validation rule, and email notifications.
- Admin Panel with full CRUD for Services, Bookings, and Contact Messages.
- Secure authentication using Laravel Breeze with an additional AdminMiddleware to restrict dashboard access.
- Global site data shared across all views via AppServiceProvider.
- Persistent session state (e.g. tracking last viewed service) and Cookies for preferred city.
- Comprehensive database setup with migrations, models, relationships, and seeders.
- Custom RESTful API endpoints for external integrations.

## Artisan Commands Used During Setup
The following Artisan commands were used to generate the application structure:

```bash
# Controllers
php artisan make:controller HomeController
php artisan make:controller ServiceController
php artisan make:controller BookingController
php artisan make:controller ContactController
php artisan make:controller AboutController
php artisan make:controller AmcController

# Admin Controllers
php artisan make:controller Admin/AdminController
php artisan make:controller Admin/BookingController --resource
php artisan make:controller Admin/ServiceController --resource
php artisan make:controller Admin/MessageController --resource

# Models & Migrations
php artisan make:model Service -m
php artisan make:model Booking -m
php artisan make:model AmcPlan -m
php artisan make:model AmcSubscription -m
php artisan make:model ContactMessage -m
php artisan make:model Testimonial -m
php artisan make:model TeamMember -m

# Mailers
php artisan make:mail BookingConfirmationMail
php artisan make:mail AdminNewBookingMail

# Custom Rules & Middleware
php artisan make:rule IndianPhoneRule
php artisan make:middleware AdminMiddleware

# Seeders
php artisan make:seeder AdminUserSeeder
php artisan make:seeder ServiceSeeder
php artisan make:seeder AmcPlanSeeder
php artisan make:seeder TestimonialSeeder
php artisan make:seeder TeamSeeder
```
