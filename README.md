# Ping CRM (vite port)

A demo application to illustrate how Inertia.js with vite works.  This project removes laravel mix and utilizes vite.  It follows current laravel-vite standards and is set up for very quick local development. 

![](https://raw.githubusercontent.com/inertiajs/pingcrm/master/screenshot.png)

## Requirements
- Laravel 8+
- PHP 8.0+
- Node v16+ (npm v8+)

## Features
- Vite (super-fast local development)
- All routing through ziggy

## Installation

Clone the repo locally:

```sh
git clone https://github.com/jwerd/pingcrm-vite.git pingcrm-vite
cd pingcrm-vite
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm ci
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations with seeds:

```sh
php artisan migrate --seed
```

Run the dev server (the output will give the address):

```sh
npm run dev
```

You're ready to go! Visit Ping CRM in your browser, and login with:

- **Username:** johndoe@example.com
- **Password:** secret

## Running tests

To run the Ping CRM tests, run:

```
phpunit
```
