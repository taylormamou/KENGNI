<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// ==================== ROUTES PUBLIQUES ====================

// Page vitrine (Accueil) - Publique
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes d'authentification Breeze (Register + Login)
require __DIR__.'/auth.php';

// ==================== ROUTES PROTÉGÉES ====================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Catalogue
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Panier
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    // Commande
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});