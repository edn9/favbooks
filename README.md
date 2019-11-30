# How to run the project

You will need php 7.1.x and composer 1.9.x (and a database, I'm using mysql/phpmyadmin/apache) to run the project. Dont forget to use the commands `composer install` and `npm i --save`.

`git clone https://github.com/edn9/favbooks`

After you clone, create a <i>.env</i> file based of <i>.env.example</i>, configure your database, generate key with:

`php artisan key:generate`

Then run the project with:

`php artisan serve`

Video sample:

[![Watch the video](https://i.imgur.com/9ZFToEA.jpg)](https://www.youtube.com/watch?v=CLikuBqQLQw)

---

# PHP Artisan Cheatsheet

### Here's a list of useful commands to use. This is just a simple sketch of what to do if its your first time trying laravel, or if you forgot something.

## First steps

After all the setup, to create a new laravel project you can use these two commands:

```php
laravel new blog
OR
composer create-project --prefer-dist laravel/laravel blog "5.8.*"
```

And then you need to generate a key, before that you will not be able to run the server, so first you gotta create a .env file (you can just copy and paste the .env.example one and configure by yourself) and then:

`php artisan key:generate`

You can specify what version you want to use at the end. To run the server:

`php artisan serve`

## Database

First, when you create a new project, you need to <a href="https://laravel.com/docs/5.8/migrations">migrate</a> to your database:

`php artisan migrate:refresh --seed`

If you working with seed, dont forget to check the <i>database/seeds/DatabaseSeeder.php</i> file, you need to tell what you gonna run to 'feed' the DB.

`php artisan make:seeder UsersTableSeeder`

Generating Migrations table:

`php artisan make:migration create_users_table`

## Models

You need to create a model when you create a table:

`php artisan make:model Books`

## Controllers

`php artisan make:controller ContactController --resource`

<i>Laravel resource routing assigns the typical "CRUD" routes to a controller with a single line of code.</i>

---

## Common Bugs

So, I dont know why but sometimes you will have this bugs, so here's a list of the one's already solve:

### Migration not working:

```php
SQLSTATE 42000: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes com PHP
```

-   Go to the file <b>app\Providers\AppServiceProvider.php</b>
-   Add namespace <b>use Illuminate\Support\Facades\Schema;</b>
-   Inside boot add <b>Schema::defaultStringLength(191);</b>

```php
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
```
