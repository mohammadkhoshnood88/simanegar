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

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'] , function () {
    Route::get('/dashboard' , [\App\Http\Controllers\AdminController::class , 'index']);

    Route::group(['prefix' => 'users'] , function () {
        Route::get('/admin' , [\App\Http\Controllers\AdminUserController::class , 'admin']);
        Route::get('/customers' , [\App\Http\Controllers\AdminUserController::class , 'customers']);
    });

    Route::group(['prefix' => 'categories'] , function () {
        Route::get('/' , [\App\Http\Controllers\AdminCategoryController::class , 'index']);
    });

    Route::group(['prefix' => 'products'] , function () {
        Route::get('/' , [\App\Http\Controllers\AdminProductController::class , 'index']);
    });

});

Auth::routes();
Route::post('/verify', [\App\Http\Controllers\Auth\LoginController::class, 'verify'])->name('code');
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class , 'logout']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
