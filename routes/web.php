<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Home\DashboardController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Visitors\Home\HomeController;
use App\Http\Controllers\Visitors\Product\VisitorProductController;
use App\Http\controllers\Visitors\Cart\CartController;
use App\Http\Controllers\Visitors\SSLPayment\CheckoutController;
use App\Http\Controllers\Visitors\SSLPayment\SslCommerzPaymentController;
use App\Http\Controllers\Visitors\Filter\FilterController;


// admin panel
Route::get('/admin', [DashboardController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::resource('products', AdminProductController::class);


// order controller
Route::get('orders', [OrderController::class, 'index'])->name('order.index');
Route::get('orders/change-status/{id}/{status?}', [OrderController::class, 'changeStatus'])->name('orders.change-status');

// home controller
Route::get('/', [HomeController::class, 'index']);

// search and paginate controller
Route::get('/visitor/products', [VisitorProductController::class, 'index']);
Route::get('/pro-category/{cat_id}', [VisitorProductController::class, 'product']);
Route::get('/product-details/{id}', [VisitorProductController::class, 'details'])->name('product.details');

// cart controller
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::put('/update-cart', [CartController::class, 'update'])->name('update');
Route::delete('/remove-from-cart', [CartController::class, 'remove']);
Route::post('/add-multi-qty-to-cart/{id}', [CartController::class, 'addMultiQtyToCart']);

// payment panel
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/payment', [CheckoutController::class, 'payment']);
Route::post('/stripe-payment', [CheckoutController::class, 'stripe']);
Route::post('/cash-on-delivery', [CheckoutController::class, 'cash']);

// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// filter controller
Route::get('/filter', [FilterController::class, 'filter']);