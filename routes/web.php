<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\AzureController;

Route::get('/', function () {
    return view('app');
})->name('home');


Route::get('/testing', function () {
    return view('testing');
})->name('testing');

Route::middleware('auth')->get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');
Route::post('/test-azure-setup', [AzureController::class, 'testAzureSetup']);

// Drink Module Routes
use App\Http\Controllers\Modules\DrinkController;
use App\Http\Controllers\Modules\OrderController;

// Auth Routes
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Auth;

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function () {
    // User routes
    Route::get('/drinks', [DrinkController::class, 'index'])->name('drinks.index');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    // Admin routes (simplified for now without dedicated middleware)
    Route::prefix('admin')->group(function () {
        Route::get('/drinks', [DrinkController::class, 'adminIndex'])->name('drinks.admin.index');
        Route::get('/drinks/create', [DrinkController::class, 'create'])->name('drinks.create');
        Route::post('/drinks', [DrinkController::class, 'store'])->name('drinks.store');
        Route::get('/drinks/{drink}/edit', [DrinkController::class, 'edit'])->name('drinks.edit');
        Route::put('/drinks/{drink}', [DrinkController::class, 'update'])->name('drinks.update');
        Route::delete('/drinks/{drink}', [DrinkController::class, 'destroy'])->name('drinks.destroy');

        Route::get('/orders', [OrderController::class, 'adminIndex'])->name('orders.admin.index');
        Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    });
});

