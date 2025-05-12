<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\AzureController;

Route::get('/', function () {
    return view('app');
})->name('home');

Route::get('/first-setup', [AppController::class, 'firstSetup']);
Route::post('/test-azure-setup', [AzureController::class, 'testAzureSetup']);
