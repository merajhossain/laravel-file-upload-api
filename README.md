# File Upload API

## About Project

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.

## Deployment instructions

-   `composer install`
-   `cp .env.example .env`
-   Put database credentials in `.env` file
-   `php artisan migrate --seed`
-   `php artisan storage:link`
-   Now you can run the application, like: `php artisan serve`
-   And application run with `http://127.0.0.1:8000`
-   Now you can call the upload api:
    -   URL: `http://127.0.0.1:8000/api/upload`
    -   METHOD: POST
    -   FORM DATA:
        -   `files[]`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
