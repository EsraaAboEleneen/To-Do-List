<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// crud todo routes
Route::resource('/todo','TodoController');
//Route::get('/todos','TodoController@index');
//Route::get('/todos/create','TodoController@create');
//Route::patch('/todos/{id}/update','TodoController@update')
//    ->name('todo.update');
//Route::delete('/todos/{todo}/delete','TodoController@delete')
//    ->name('todo.delete');
//Route::post('/todos/create','TodoController@store');
//Route::get('/todos/{id}/edit','TodoController@edit');
////================
Route::put('/todos/{todo}/complete','TodoController@complete')
    ->name('todo.complete');
Route::delete('/todos/{todo}/incomplete','TodoController@incomplete')
    ->name('todo.incomplete');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/user',"UserController@index");

Auth::routes();

Route::post('/upload',"UserController@uploadAvatar");

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
