<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('books');
});

Route::resource('books', 'BookController');

/*
Using the resource() static method of Route, you can create multiple routes to expose multiple actions on the resource.
GET/contacts, mapped to the index() method,
GET /contacts/create, mapped to the create() method,
POST /contacts, mapped to the store() method,
GET /contacts/{contact}, mapped to the show() method,
GET /contacts/{contact}/edit, mapped to the edit() method,
PUT/PATCH /contacts/{contact}, mapped to the update() method,
DELETE /contacts/{contact}, mapped to the destroy() method.
*/
