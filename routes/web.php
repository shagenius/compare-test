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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/gallery/{category}', 'HomeController@gallery')->name('gallery');

Route::get('/photo/{id}', 'HomeController@photo')->name('photo');

Route::get('/categories', 'CategoryController@index')->name('categories.index');

Route::get('/categories/create', 'CategoryController@create')->name('categories.create');

Route::post('/categories', 'CategoryController@store')->name('categories.store');

Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');
    
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');

Route::put('/categories/{id}', 'CategoryController@update')->name('categories.update');

Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.destroy');


Route::resource('users', 'UserController')->parameters([
    'users' => 'user_id'
]);


Route::resource('users', 'UserController');

Route::get('admin', 'AdminController@index')->name('admin');

Auth::routes();

