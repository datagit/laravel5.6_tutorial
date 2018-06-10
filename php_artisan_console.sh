#!/usr/bin/env bash
#http://laravel.com/
composer create-project laravel/laravel laravel5.6_tutorial
#start server
php artisan serve
#show list command
php artisan
#show list routes
php artisan route:list
#http://laravel-recipes.com/
php artisan make:controller UriController
#install Laravel - Forms
#https://laravelcollective.com/docs/master/html#installation
composer require "laravelcollective/html":"^5.4.0"
