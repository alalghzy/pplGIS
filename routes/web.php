<?php

use App\Http\Controllers\KarangController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('admin.lamanData');
// });

// Route Login
Route::resource('/login', LoginController::class)
    ->except('edit', 'create', 'show', 'destroy', 'update',);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Home
Route::resource('/', HomeController::class)
    ->except('edit', 'create', 'show', 'destroy', 'update', 'store');

Route::group(['prefix' => 'laman', 'middleware' => ['auth'], 'as' => ''], function () {

    // Route Dashboard
    Route::resource('/dashboard', DashboardController::class)
        ->except('edit', 'create', 'show', 'destroy', 'update', 'store');

    // Route Data Pengguna
    Route::resource('/data-pengguna', UserController::class);

    // Route Stasiun
    Route::resource('/stasiun', PostController::class);

    // Route Peta
    Route::resource('/peta', PetaController::class)
        ->except('edit', 'create', 'show', 'destroy', 'update', 'store');

    // Route Karang
    Route::resource('/karang', KarangController::class)
        ->except('edit', 'create', 'show', 'destroy', 'update', 'store');

    // Hapus selected data
    Route::delete('delete-all', [PostController::class, 'delete_all']);

    // Hapus gambar di Edit Data
    Route::get('/delete-image/{id}', [PostController::class, 'deleteImage'])->name('delete.image');
});
