<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/contact', function () {
    return view('contact.index');
});
Route::get('/connexion', function () {
    return view('connexion');
});
Route::get('/inscription', function () {
    return view('inscription');
});
Route::get('/usersaccueil', function () {
    return view('users.products.index');
});
Route::get('/product', [ProductController::class, 'index']);
Route::get('/usersaccueil', [UserProductController::class, 'index']);

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/ordersutilisateur', [OrderController::class, 'index'])->name('orders.index');
