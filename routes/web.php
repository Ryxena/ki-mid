<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ValidationController;

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

Route::get('/',  [PostController::class, 'index']);
Route::get('/post/{lang}/{slug}',  [PostController::class, 'show']);
Route::get('/register',  [UserController::class, 'create'])->middleware('auth.user');
Route::post('/register',  [UserController::class, 'store'])->name('signup');
Route::get('/login',  [UserController::class, 'logon'])->middleware('auth.user');
Route::post('/login',  [UserController::class, 'login'])->name('login');
Route::get('dashboard',  [UserController::class, 'index'])->middleware('auth.user');
Route::prefix('users')->group(function() {
    Route::get('/', [UserController::class, 'repo']);
});
