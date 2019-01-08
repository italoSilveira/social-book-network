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

Route::get('/book', 'BookController@index');
Route::get('/book/create', 'BookController@create');
Route::post('/book', 'BookController@store');
Route::get('/book/{book}', 'BookController@show');
Route::get('/book/{book}/edit', 'BookController@edit');
Route::patch('/book/{book}/edit', 'BookController@update');
