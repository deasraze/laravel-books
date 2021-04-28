<?php

use App\Http\Controllers\Authors\AuthorController;
use App\Http\Controllers\Books\BookController;
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

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');

Auth::routes();

Route::get('authors/show/{author}', [AuthorController::class, 'show'])->name('authors.show');
Route::get('books/show/{book}', [BookController::class, 'show'])->name('books.show');

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'middleware' => ['auth'],
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('books', 'BookController')->except('show');
        Route::resource('authors', 'AuthorController')->except('show');
    }
);
