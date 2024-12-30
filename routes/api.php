<?php

use App\Http\Controllers\api_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/users', [api_controller::class, 'create']);
Route::post('/users', [api_controller::class, 'store'])->name('users.store');
Route::get('/users/{id}', [api_controller::class, 'show']);
Route::put('/users/{id}', [api_controller::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [api_controller::class, 'destroy']);
