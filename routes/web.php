<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('home',[MovieController::class,'homepage'])->name('home');


Route::resource('movie', MovieController::class)->middleware('auth');
Route::resource('category', CategoryController::class);

Route::get('detailmovie/{id}/{slug}', [MovieController::class, 'detail'])->name('detail');

Route::get('createMovie',[MovieController::class,'create'])->name('createMovie')->middleware('auth');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', RoleAdmin::class])->group(function () {
    Route::get('/movie/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
    Route::put('/movie/{movie}', [MovieController::class, 'update'])->name('movie.update');
});


