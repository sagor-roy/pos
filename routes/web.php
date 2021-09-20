<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\LoginController;
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
    // add customer
    Route::get('add-customer',[BackendController::class,'addCustomer'])->name('add-customer');
    // add category
    Route::get('category',[BackendController::class,'cate'])->name('cate');
    // add sub category
    Route::get('sub-category',[BackendController::class,'subCate'])->name('sub-cate');

});
