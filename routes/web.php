<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminStoreController;

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

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('loginAdmin')->middleware('guest');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout']);

Route::get('/admin/stores/checkSlug', [AdminStoreController::class, 'checkSlug'])->middleware('auth');
Route::resource('/admin/stores', AdminStoreController::class)->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

