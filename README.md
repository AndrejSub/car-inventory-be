# Car Inventory Backend

This is the backend for the Car Inventory system, built with Laravel.

## 🚀 Getting Started

### Prerequisites

Ensure you have the following installed:

- PHP 8.2+
- Composer
- MySQL or another supported database
- (Optional) Herd for local development

### Installation

Clone the repository and install dependencies:

```sh
composer install
```

I did provide .env file so you don't have to copy it 

Update `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=car_inventory_be
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations:

```sh
php artisan migrate
```

### Running the Server

#### Using Herd (Recommended)

Herd automatically sets up a local `.test` domain for the application:

```
http://car-inventory-be.test
```

#### Without Herd

Run the Laravel development server manually:

```sh
php artisan serve --host=0.0.0.0 --port=8000
```

Update the frontend  in {Your repository}/src/services/apiService.js `API_BASE_URL` accordingly:

```js
const API_BASE_URL = "http://127.0.0.1:8000";
```

### CORS Configuration

CORS has been enabled globally to allow frontend applications to communicate with the API. If you are not using Herd, ensure that CORS is configured correctly in `config/cors.php`.

### API Documentation

To explore API endpoints, use:

```sh
php artisan route:list
```

### Troubleshooting

- If you face **CORS issues**, update `config/cors.php` to specify allowed origins.
- If the application doesn't start, ensure your **database is running** and `.env` is correctly configured.


