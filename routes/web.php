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

Route::get('/book/create', 'BookController@create');
Route::post('/book/create', 'BookController@store');
Route::get('/book/edit/{id}', 'BookController@getStore');
Route::post('/book/edit/{id}', 'BookController@store');
