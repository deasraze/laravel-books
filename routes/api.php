<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->group(function () {
    Route::group(['prefix' => 'v1', 'namespace' => 'App\\Http\\Controllers\\Api\\V1'], function () {
        Route::group(['prefix' => 'books', 'namespace' => 'Books'], function () {
            Route::get('list', 'BookController@list');
            Route::get('by-id/{book}', 'BookController@book');
            Route::put('update/{book}', 'BookController@update');
            Route::delete('{book}', 'BookController@remove');
        });
    });
});
