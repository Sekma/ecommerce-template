<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONT
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController as FrontProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [FrontProductController::class, 'index'])
    ->name('products.index');

Route::get('/category/{category:slug}', [FrontProductController::class, 'category'])
    ->name('products.category');

Route::get('/products/{product:slug}', [FrontProductController::class, 'show'])
    ->name('products.show');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SettingController;

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', CategoryController::class);

        Route::resource('products', AdminProductController::class);

        Route::resource('orders', OrderController::class);

        Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

        Route::resource('customers', CustomerController::class)
            ->only(['index', 'show']);

        Route::get('settings', [SettingController::class, 'index'])
            ->name('settings');
    });

require __DIR__.'/auth.php';