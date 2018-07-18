<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'AuthController@register');

Route::post('login', 'AuthController@login');

Route::apiResource('books', 'BookController');

Route::post('books/{book}/ratings', 'RatingController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List articles
Route::get('articles', 'ArticleController@index');

// List single article
Route::get('article/{id}', 'ArticleController@show');

// Create new article
Route::post('article', 'ArticleController@store');

// Update article
Route::put('article', 'ArticleController@store');

// Delete article
Route::delete('article/{id}', 'ArticleController@destroy');



// List shipments
Route::get('shipments', 'ShipmentController@index');

// List single shipment
Route::get('shipment/{reference}', 'ShipmentController@show');

// Create new shipment
Route::post('shipment', 'ShipmentController@store');