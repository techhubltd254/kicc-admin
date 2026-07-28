# KICC Admin Panel

Separate admin application for KICC Platform.

## Setup

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --force
php artisan serve --port=8080
```