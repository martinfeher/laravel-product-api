## Description

Create Product, Customer and Order API with /api/products, /api/customers, /api/orders endpoints to view, store, update and delete the data.
A Product contains standard properties. Validation to store and update items is implemented via Laravel Requests.
Relationships are implemented the following way one order belongs to a customer, the product has many order items, the product belongs to many product categories, product tags. A promo code belongs to a customer.


### Prerequisites
PHP >= 8.2
composer dependency manager

## Installation
```
git clone https://github.com/martinfeher/laravel-product-api.git
cd laravel-product-api
```


1. Copy `.env.example` to `.env`:

    ```shell
    cp .env.example .env
    ```

2. Install the dependencies:

    ```shell
    composer install
    ```

3. Generate application key:

    ```shell
    php artisan key:generate
    ```

4. Run database migration with seeder:

    ```shell
    php artisan migrate --seed
    ```

5. Start the local server:

    ```shell
    php artisan serve
    ```
