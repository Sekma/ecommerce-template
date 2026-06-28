<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    Route::resource('orders', OrderController::class);
    Route::patch( 'orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::resource('customers', CustomerController::class)->only(['index', 'show']);
    
    Route::get('settings', [SettingController::class, 'index'])->name('settings');

});

require __DIR__.'/auth.php';
