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

Auth::routes();

Route::get('/', 'TodoController@index');

Route::get('/addTodo', 'TodoController@addTodo');

Route::get('/todo/edit/{id}', 'TodoController@editTodo');

Route::post('/todo', 'TodoController@todo');
Route::post('/todo/{id}', 'TodoController@edit');

Route::delete('/todo/{id}', 'TodoController@delete');
