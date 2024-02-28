<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;

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
Route::get('/contactuser', function () {
    return view('users.contact.index');
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
Route::get('/adminaccueil', function () {
    return view('admin.products.index');
});
/*USERS */
Route::get('/product', [ProductController::class, 'index']);
Route::get('/usersaccueil', [UserProductController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/ordersutilisateur', [OrderController::class, 'index'])->name('orders.index');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('/profil', [UserProfileController::class, 'show'])->name('profil.show');
/*VERIF */
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
/*ADMIN */
Route::get('/adminaccueil', [AdminProductController::class, 'index']);
Route::get('/profiladmin', [AdminProfileController::class, 'show'])->name('profil.show');

Route::prefix('admin')->group(function () {
    Route::post('products/{id}/add-quantity', [AdminProductController::class, 'addQuantity'])->name('admin.products.add_quantity');
    Route::post('products/{id}/remove-quantity', [AdminProductController::class, 'removeQuantity'])->name('admin.products.remove_quantity');
});
