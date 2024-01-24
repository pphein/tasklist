<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/tasks', 'TaskController@index');
Route::post('/tasks/create', 'TaskController@add');
Route::get('/tasks/edit/{id}', 'TaskController@edit');
Route::get('/tasks/delete/{id}', 'TaskController@delete');
Route::post('/tasks/update', 'TaskController@update');




Route::get('/home', 'HomeController@index')->name('home');
