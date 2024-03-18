<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return "it works";
});
Route::group(['prefix' => 'siswa'], function() { 
    Route::get('/', [SiswaController::class, "show"]);
    Route::get('/detail/{nis}', [SiswaController::class, "detail"]);
    Route::post('/create', [SiswaController::class, "create"]);
    Route::patch('/update', [SiswaController::class, "update"]);
    Route::delete('/delete', [SiswaController::class, "destroy"]);
});

Route::group(['prefix' => 'todo', 'middleware' => 'api'], function() {
    Route::post('/create', [TodoController::class, "create"]);
    Route::get('/get-todo', [TodoController::class, "index"]);
    Route::get('/detail/{id}', [TodoController::class, "show"]);
    Route::patch('/update', [TodoController::class, "edit"]);
    Route::delete('/delete', [TodoController::class, "destroy"]);
});

Route::prefix('/auth')->controller(UserController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});