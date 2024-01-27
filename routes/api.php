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

Route::get('/', function() {
    return "it works";
});
Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, "show"]);
    Route::get('/detail/{nis}', [SiswaController::class, "detail"]);
    Route::post('/create', [SiswaController::class, "create"]);
    Route::patch('/update', [SiswaController::class, "update"]);
    Route::delete('/delete', [SiswaController::class, "destroy"]);
});