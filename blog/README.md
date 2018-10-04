#### Init
    - https://www.cloudways.com/blog/whats-new-in-laravel-5-6/
#### Best Practices Examples
    - https://www.cloudways.com/blog/laravel-tutorials-for-beginners/#LaravelRoutes
    - http://www.laravelbestpractices.com/#debugging
#### Common Packages
    - https://github.com/barryvdh/laravel-debugbar
    - https://laravel.com/docs/5.6/logging#building-log-stacks
#### Basic
    - https://www.cloudways.com/blog/routing-in-laravel/
    - https://laravel.com/docs/5.6/migrations
    - (Best Practices for Development with Laravel) https://medium.com/@cloudways/best-practices-for-development-with-laravel-5e4746a327ab
    - (how to using tinker)  https://scotch.io/tutorials/tinker-with-the-data-in-your-laravel-apps-with-php-artisan-tinker
    ```bash
        #check connect to DB
        $php artisan tinker
        DB::connection()->getPdo()
    ```
    - (version control database schema) https://laravel.com/docs/5.6/migrations
    - (testing database) factory https://laravel.com/docs/5.6/database-testing
    - (data seed for testing) https://laravel.com/docs/5.6/seeding
    
#### Testing
    - https://laravel.com/docs/5.2/testing#custom-http-requests
    - https://semaphoreci.com/community/tutorials/getting-started-with-phpunit-in-laravel
    - https://github.com/laravel/browser-kit-testing
    ```bash
    $ composer require laravel/browser-kit-testing --dev
    $ ./vendor/bin/phpunit
    ```
    - Browser Tests (Laravel Dusk) for automation testing: https://laravel.com/docs/5.6/dusk
    ```bash
        composer require --dev laravel/dusk
        php artisan dusk:install
        php artisan dusk
    ```
#### Laravel Log View
    - doc: https://github.com/rap2hpoutre/laravel-log-viewer 
