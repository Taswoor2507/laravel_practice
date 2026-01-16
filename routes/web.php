<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', fn()=>view('home'));

Route::get('/register', fn()=>view('auth.register'));
Route::post('/register',[AuthController::class,'register']);

Route::get('/login', fn()=>view('auth.login'));
Route::post('/login',[AuthController::class,'login']);

Route::post('/logout',[AuthController::class,'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/todos',[TodoController::class,'index']);
    Route::post('/todos',[TodoController::class,'store']);
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/todos',[AdminController::class,'allTodos']);
});
