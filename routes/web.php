<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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
    return view('index');
})->name('index');
Route::get('admin/login',[UserController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/signin',[UserController::class, 'adminSignin'])->name('admin.signin');
Route::prefix('client')->group(function () {
    Route::get('/product/all-product', [ProductController::class, 'indexProduct'])->name('indexProduct');
    Route::get('/product/{id}-{slug}.html', [ProductController::class, 'indexProductWCate'])->name('indexProductWCate');
    Route::get('/product/details/{id}-{slug}.html',[ProductController::class,'details'])->name('details');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/signin', [UserController::class, 'signin'])->name('signin');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/signup', [UserController::class, 'signup'])->name('signup');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/purchase/{id}', [CartController::class, 'add'])->name('purchase');
    Route::post('/updateCart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/deleteCart/{id}', [CartController::class, 'detele'])->name('cart.delete');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::middleware('login')->get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/order', [CartController::class, 'order'])->name('order');
});
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::prefix('category')->group(function () {
        Route::get('/deleted', [CategoryController::class, 'deleted'])->name('category.deleted');
        Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });
    Route::prefix('product')->group(function () {
        Route::get('/deleted', [ProductController::class, 'deleted'])->name('product.deleted');
        Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });
    Route::resources(
        [
            'category' => CategoryController::class,
            'product' => ProductController::class,
        ]
    );
});
