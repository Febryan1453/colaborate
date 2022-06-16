<?php

use App\Http\Controllers\Welc0meController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     echo "Hello World";
// });

Route::controller(Welc0meController::class)->group(function () {
    Route::get('/', 'index')->name("welcome.index");
    Route::get('/tambah-film-baru', 'tambah')->name("welcome.tambah");
    Route::post('/save-film-baru', 'save')->name("welcome.store");
    Route::delete('/hapus-film/{id}', 'hapus')->name("welcome.hapus");
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/data-film', [App\Http\Controllers\HomeController::class, 'film'])->name('film');
