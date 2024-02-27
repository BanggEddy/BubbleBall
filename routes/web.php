<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
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
Route::get('/product', [ProductController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
