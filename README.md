# Veratech Website

Corporate website + CMS for Veratech.

## Requirements
- PHP >= 8.2 with pdo_mysql, mbstring, openssl, fileinfo
- MySQL >= 8.0
- Composer 2
- (optional) Node 18+ if you want Vite

## Installation
```bash
composer install
cp .env.example .env
php artisan key:generate
# configure DB credentials in .env
php artisan migrate --seed
php artisan storage:link
php artisan serve