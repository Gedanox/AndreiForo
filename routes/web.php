<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;




Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('user/login', [MainController::class, 'login'])->name('login');
Route::get('user/logout', [MainController::class, 'logout'])->name('logout');

Route::resource('user', UserController::class);
Route::resource('post', PostController::class);
Route::resource('comment', CommentController::class);