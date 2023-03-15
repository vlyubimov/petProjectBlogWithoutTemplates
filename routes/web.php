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

Route::get('/', 'staticController@index');

Route::get('/about-us', 'staticController@about');

Route::get('/blog', 'blogController@blog');


Route::get('/articles', 'ArticlesController@index');

Route::get('/article/add', 'ArticlesController@create');
Route::post('/article/add', 'ArticlesController@store');

Route::get('/article/{id}', 'ArticlesController@show');

Route::get('/article/{id}/edit', 'ArticlesController@edit');
Route::put('/article/{id}/edit', 'ArticlesController@update');
Route::delete('/article/{id}/delete', 'ArticlesController@destroy');


Route::get('/public/shop', 'ShopController@index');
Route::get('/public/shop/{id}', 'ShopController@show');



Route::post('/article/{id}', 'CommentsController@store');


Auth::routes();

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
