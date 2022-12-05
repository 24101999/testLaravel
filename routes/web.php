<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'insert']);
Route::get('/api', [HomeController::class, 'get']);
Route::get('/edit{id?}', [HomeController::class, 'edit']);
Route::put('/update{id?}', [HomeController::class, 'update'])->name('update');