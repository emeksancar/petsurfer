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
    return view('welcome');
});

Auth::routes();

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
// Books
Route::get('books/list', 'BooksController@list')->name('books.list');

//Authors
Route::get('author/create', 'AuthorsController@create')->name('author.create');
Route::post('author/store', 'AuthorsController@store')->name('author.store');


//Categories