<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('guest')->group(function () {
    Route::get('/login',[MainController::class,'login'])->name('auth.login');
    Route::post('/login',[MainController::class,'authorization'])->name('auth.login');
    Route::get('/register',[MainController::class,'register'])->name('auth.register');
    Route::post('/register',[MainController::class,'registration'])->name('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class,'index'])->name('home');
    Route::get('/logout', [MainController::class,'logout'])->name('auth.logout');
    Route::get('/profile', [MainController::class,'index'])->name('profile');

    Route::prefix('/posts')->name('posts.')->group(function () {
        Route::get('/upload',[PostController::class,'create'])->name('create');
    });
    
});


