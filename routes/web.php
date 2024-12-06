<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\WaiterController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


    Route::get('/manager', [ManagerController::class, 'index'])->name('manager')->middleware('can:isManager');

    Route::get('/chef', [ChefController::class, 'index'])->name('chef')->middleware('can:isChef');

    Route::get('/waiter', [WaiterController::class, 'index'])->name('waiter')->middleware('can:isWaiter');



    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('delete_category/{id}', [CategoryController::class, 'delete_category']);
    Route::get('edit_category/{id}', [CategoryController::class, 'edit_category']);
    Route::post('update_category/{id}', [CategoryController::class, 'update_category']);


    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/product_create', [ProductController::class, 'create']);


    Route::get('/add_cart/{id}', [CartController::class, 'add']);
    Route::get('/mycart', [CartController::class, 'mycart']);
    Route::get('/delete_cart/{id}', [CartController::class, 'destroy']);
    Route::post('/confirm_order', [CartController::class, 'confirm_order']);


    Route::get('/myorder', [OrderController::class, 'myorder_front']);
    Route::get('/orders', [OrderController::class, 'index'])->middleware('can:isManager', 'can:isChef');
    Route::get('/onTheWay/{id}', [OrderController::class, 'onTheWay']);
    Route::get('/delivered/{id}', [OrderController::class, 'delivered']);