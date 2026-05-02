<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\OrderHistoryController;
use Illuminate\Support\Facades\Route;

// ==================== ROUTES PUBLIQUES ====================
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes d'authentification (Breeze)
require __DIR__.'/auth.php';

// ==================== ROUTES PROTÉGÉES (Clients) ====================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
    return redirect()->route('products.index');
    })->name('dashboard');
    // Catalogue client
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Panier & Commande
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Historique des commandes du client
    Route::get('/my-orders', [OrderHistoryController::class, 'index'])->name('orders.history');
    Route::get('/my-orders/{order}', [OrderHistoryController::class, 'show'])->name('orders.show');

});

// ==================== ROUTES ADMIN ====================
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestion des produits
    Route::resource('products', AdminProductController::class);
});

// Gestion des commandes Admin
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('orders', \App\Http\Controllers\Admin\OrderManagementController::class)
            ->only(['index', 'show']);

        Route::patch('/orders/{order}/status', 
            [\App\Http\Controllers\Admin\OrderManagementController::class, 'updateStatus'])
            ->name('orders.status');
    });

    