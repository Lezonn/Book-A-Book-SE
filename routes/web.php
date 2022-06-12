<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminStoreController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoreController;

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

// CUSTOMER
Route::get('/', [LandingPageController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/stores', [StoreController::class, 'index']);
Route::get('/stores/{store}/books', [StoreController::class, 'show']);

// ADMIN
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('loginAdmin')->middleware('guest');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::get('/admin/stores/checkSlug', [AdminStoreController::class, 'checkSlug'])->middleware('admin');
Route::resource('/admin/stores', AdminStoreController::class)->middleware('admin');

Route::get('/admin/users/checkSlug', [AdminUserController::class, 'checkSlug'])->middleware('admin');
Route::resource('/admin/users', AdminUserController::class)->middleware('admin');

Route::get('/admin/books/checkSlug', [AdminBookController::class, 'checkSlug'])->middleware('admin');
Route::resource('/admin/books', AdminBookController::class)->middleware('admin');
