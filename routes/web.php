<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminStoreController;
use App\Http\Controllers\LandingPageController;

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

Route::get('/', [LandingPageController::class, 'index']);




// ADMIN
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('loginAdmin')->middleware('guest');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

Route::get('/admin/stores/checkSlug', [AdminStoreController::class, 'checkSlug'])->middleware('auth');
Route::resource('/admin/stores', AdminStoreController::class)->middleware('auth');

Route::get('/admin/users/checkSlug', [AdminUserController::class, 'checkSlug'])->middleware('auth');
Route::resource('/admin/users', AdminUserController::class)->middleware('auth');

Route::get('/admin/books/checkSlug', [AdminBookController::class, 'checkSlug'])->middleware('auth');
Route::resource('/admin/books', AdminBookController::class)->middleware('auth');
