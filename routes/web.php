<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [ProductsController::class, 'home'])->name('home');

Route::get('/', function () {
    if (auth()->user()->role === 'admin') {
        return view('welcome');
    }
    return redirect()->route('home');
});


Route::get('product/{id}', [ProductsController::class, 'view']);
Route::get('/search', [ProductsController::class, 'search'])->name('product.search');
// login route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');



// register route
Route::get('/register', function () {
    return view('auth.register');
})->name('register');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // add to cart
    Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    // cart
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    // cart item delete
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    // logout route
    Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

    // Route::get('/', function () {
    //     if (auth()->user()->role === 'admin') {
    //         return view('welcome');
    //     }
    //     return redirect('/');
    // });
});

require __DIR__ . '/auth.php';
