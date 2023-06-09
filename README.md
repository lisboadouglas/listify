<p align="center" style="font-size: 60px"> Listify </p>


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

This documentation is intended to describe the Listify API – Your shopping list
online, so you can manipulate it through GET, POST, PUT and DELETE methods.

### API DOCUMENTATION
- [API DOCUMENTATION](https://drive.google.com/file/d/1Y8EWYkIfWpb-IVURgxNWJWOe9kFYBNfd/view?usp=sharing).

### POSTMAN COLLECTION
- [POSTMAN](https://documenter.getpostman.com/view/14634687/2s93sc4CUb)
### Check out the resources that are available

- **Users**
-- **The Register**
-- **The Login**
-- **The Profile**
- **Lists**
-- **List registration**
-- **Displaying all lists**,
-- **Displaying a specific list (Displays all added products)**
-- **Updating the list (only updates the list and not the products)**
-- **Removing a list**,
-- **Cloning a list**
- **Products:**
-- **The Register of products to a list,**
-- **Displays all products from a list,**
-- **Updating product data,**
-- **Removing a product**

## Installation and Usage
Create Mysql Database of your choice


Clone this repo
```bash
git clone https://github.com/lisboadouglas/listify/ listify
```

Go to listify folder and create .env file:
```bash
cp .env.example .env
nano .env
```

Change `.env` file with environment variables:

```bash
DB_CONNECTION=mysql
DB_HOST=%db_host%
DB_PORT=3306
DB_DATABASE=%db_name%
DB_USERNAME=%db_user%
DB_PASSWORD=%db_pass%
```
Install dependencies, key generate, clear cache, run migrations:

```bash
composer install #install all dependencies
php artisan migrate #populate db with all tables
php artisan key:generate #register a key for the use in laravel
php artisan config:cache #clear cache 
php artisan serve #starta web application
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
