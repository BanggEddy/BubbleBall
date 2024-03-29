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
use App\Http\Controllers\Admin\AddProductController;
use App\Http\Controllers\Admin\DeleteProductController;
use App\Http\Controllers\Admin\AdminOrdersController;
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
Route::get('/', function () {
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
    Route::put('products/{id}/add-quantity', [AdminProductController::class, 'addQuantity'])->name('admin.products.addQuantity');
    Route::put('products/{id}/remove-quantity', [AdminProductController::class, 'removeQuantity'])->name('admin.products.removeQuantity');
});
/**ADD */
Route::get('/admin/add', [AddProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/add', [AddProductController::class, 'store'])->name('admin.products.store');

Route::get('/adminaccueil', [AdminProductController::class, 'index'])->name('admin.products.index');

/**SUPP */
Route::get('/admin/delete', [DeleteProductController::class, 'index'])->name('admin.products.delete');
Route::delete('/admin/delete/{id}', [DeleteProductController::class, 'destroy'])->name('admin.products.destroy');

/**Order Admin */
Route::prefix('admin')->group(function () {
    Route::get('/orders', [AdminOrdersController::class, 'index'])->name('admin.orders.index');
});

Route::delete('/admin/orders/{order}', [AdminOrdersController::class, 'destroy'])->name('admin.orders.destroy');
