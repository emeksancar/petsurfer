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
Route::get('home', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Books
Route::get('books/list', 'BooksController@list')->name('books.list');
Route::get('book/create', 'BooksController@create')->name('book.create');
Route::get('book/delete/{id}  ', 'BooksController@destroy')->name('book.delete');
Route::post('book/store', 'BooksController@store')->name('book.store');
Route::get('book/edit/{id}', 'BooksController@edit')->name('book.edit');
Route::post('book/update', 'BooksController@update')->name('book.update');

//Authors
Route::get('author/list', 'AuthorsController@list')->name('author.list');
Route::get('author/create', 'AuthorsController@create')->name('author.create');
Route::get('author/delete/{id}  ', 'AuthorsController@destroy')->name('author.delete');
Route::post('author/store', 'AuthorsController@store')->name('author.store');
Route::get('author/edit/{id}', 'AuthorsController@edit')->name('author.edit');
Route::post('author/update', 'AuthorsController@update')->name('author.update');

//Categories
Route::get('category/list', 'CategoriesController@list')->name('category.list');
Route::get('category/create', 'CategoriesController@create')->name('category.create');
Route::get('category/delete/{id}  ', 'CategoriesController@destroy')->name('category.delete');
Route::post('category/store', 'CategoriesController@store')->name('category.store');
Route::get('category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
Route::post('category/update', 'CategoriesController@update')->name('category.update');
