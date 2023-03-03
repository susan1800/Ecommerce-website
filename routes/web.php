<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
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

require 'admin.php';

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/{id}/products', [ProductController::class, 'shopByCategory'])->name('shopby.category');
Route::get('/{id}/product-details', [ProductController::class, 'shopDetails'])->name('shop.details');



Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');




//cart
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('getcart');
Route::post('/addtocart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addtocart');
Route::get('{id}/removecart', [\App\Http\Controllers\CartController::class, 'removeCart'])->name('removecart');


//checkout

Route::post('checkout', [\App\Http\Controllers\CheckoutController::class, 'saveorderdata'])->name('checkout');


Route::get('checkout/cashondelivery', [\App\Http\Controllers\CheckoutController::class, 'cashOnDelivery'])->name('checkout.cashondelivery');
Route::post('checkout/qrscan', [\App\Http\Controllers\CheckoutController::class, 'qrScan'])->name('checkout.qrscan');



Route::get('/ordercomplete', [\App\Http\Controllers\CheckoutController::class, 'completeorder'])->name('submit.complete');

// Route::post('search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');

//search
Route::post('search',[\App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('search_result\{search}',[\App\Http\Controllers\SearchController::class, 'search'])->name('search.result');
