<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

// Routing untuk product
Route::resource('products', ProductController::class);

// Routing untuk transaction
Route::get('/transaction', [TransactionController::class, 'handleTransaction']);