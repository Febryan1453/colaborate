<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(MovieController::class)->group(function () {
    Route::get('/movie', 'index');
    // Route::get('/tambah-film-baru', 'tambah')->name("welcome.tambah");
    // Route::post('/save-film-baru', 'save')->name("welcome.store");
    // Route::delete('/hapus-film/{id}', 'hapus')->name("welcome.hapus");
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/regis', 'register');
    // Route::delete('/hapus-film/{id}', 'hapus')->name("welcome.hapus");
});
