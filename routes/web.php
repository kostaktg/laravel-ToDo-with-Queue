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

Route::get('/', 'ToDoController@index')->name('home');


Auth::routes();

Route::get('/home', 'ToDoController@index')->name('home');


Route::get('/todo', 'ToDoController@create')->name('todo');

Route::post('todo/store', 'ToDoController@store')->name('store');

Route::get('/show/{id}', 'ToDoController@show')->name('show');

Route::post('/update/{id}', 'ToDoController@update')->name('update');

Route::get('/delete/{id}', 'ToDoController@delete')->name('delete');


