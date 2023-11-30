<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::post('/siswa', [SiswaController::class, 'store']);
Route::put('/siswa', [SiswaController::class, 'edit']);
Route::delete('/siswa', [SiswaController::class, 'delete']);
Route::get('/siswa', [SiswaController::class, 'show']);