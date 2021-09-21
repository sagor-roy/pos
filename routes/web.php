<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\cart\CartController;
use App\Http\Controllers\backend\category\CategoryController;
use App\Http\Controllers\backend\customer\CustomerController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\order\OrderController;
use App\Http\Controllers\backend\product\ProductController;
use Illuminate\Support\Facades\Route;


// login route
Route::middleware('loggedIn')->group(function(){
    Route::get('/',[BackendController::class,'index']);
});
// logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
// login route
Route::post('dashboard',[LoginController::class,'login'])->name('admin.login');
// admin
Route::prefix('admin/')->name('admin.')->middleware('admin')->group(function(){
    // dashboard
    Route::get('dashboard',[BackendController::class,'dash'])->name('dashboard');
    // customer list
    Route::get('customer',[BackendController::class,'customer'])->name('customer');
    Route::post('customer-store',[CustomerController::class,'store'])->name('customer-store');
    Route::get('customer-delete/{id}',[CustomerController::class,'destroy'])->name('customer-delete');
    Route::post('customer-edit/{id}',[CustomerController::class,'edit'])->name('customer-edit');
    // add category
    Route::get('category',[BackendController::class,'cate'])->name('cate');
    Route::post('category-store',[CategoryController::class,'store'])->name('cate-store');
    Route::post('category-edit/{id}',[CategoryController::class,'edit'])->name('cate-edit');
    Route::get('category-delete/{id}',[CategoryController::class,'destroy'])->name('cate-delete');
    // product list
    Route::get('product',[BackendController::class,'product'])->name('product');
    Route::post('product-store',[ProductController::class,'store'])->name('product-store');
    Route::get('product-delete/{id}',[ProductController::class,'destroy'])->name('product-delete');
    Route::post('product-edit/{id}',[ProductController::class,'edit'])->name('product-edit');
    // product-order
    Route::get('product-order',[BackendController::class,'proOrder'])->name('product-order');
    // all order
    Route::get('all-order',[BackendController::class,'allOrder'])->name('all-order');
    Route::get('add-to-cart/{id}',[CartController::class,'store'])->name('cart-store');
    Route::get('cart-delete/{id}',[CartController::class,'destroy'])->name('cart-delete');
    Route::post('qty-update/{id}',[CartController::class,'edit'])->name('qty-update');
    Route::post('order',[OrderController::class,'store'])->name('order');
    Route::get('order', function () {
        return redirect()->back();
    });
    Route::get('view/{id}',[OrderController::class,'show'])->name('view');
    // pending order
    Route::get('pending-order',[BackendController::class,'pendingOrder'])->name('pending-order');
    // success order
    Route::get('success-order',[BackendController::class,'successOrder'])->name('success-order');

});
