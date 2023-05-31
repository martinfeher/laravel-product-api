

### Prerequisites
PHP >= 8.2

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
