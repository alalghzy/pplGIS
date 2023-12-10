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

// Route Authenticate
Route::resource('/login', LoginController::class)
    ->except('edit', 'create', 'show', 'destroy', 'update',);
Route::post('proses_register', [LoginController::class, 'proses_register'])->name('proses_register');
Route::post('proses_login', [LoginController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Lupa Password
Route::post('/forget_password', [LoginController::class, 'send_request_reset'])->name('send_request_reset');
Route::get('/password/reset{token}', [LoginController::class, 'reset_password'])->name('reset_password');
Route::post('/password/reset', [LoginController::class, 'update_password'])->name('password_reset');

// Route Langding Page
Route::resource('/', HomeController::class)
    ->except('edit', 'create', 'show', 'destroy', 'update', 'store');

Route::group(['prefix' => 'laman', 'middleware' => ['auth'], 'as' => ''], function () {

    Route::group(['middleware' => 'status:Administrator'], function () {
        Route::resource('/data-pengguna', UserController::class);
    });

    Route::resource('/dashboard', DashboardController::class)
        ->except('edit', 'create', 'show', 'destroy', 'update', 'store');

    Route::resource('/stasiun', PostController::class);

    Route::resource('/peta', PetaController::class)
        ->except('edit', 'create', 'show', 'destroy', 'update', 'store');

    Route::resource('/karang', KarangController::class)
        ->except('edit', 'create', 'show', 'destroy', 'update', 'store');

    Route::delete('/delete-all-users', [UserController::class, 'delete_all']);
    Route::delete('/delete-all-stasiuns', [PostController::class, 'delete_all']);

    Route::get('/delete-image/{id}', [PostController::class, 'deleteImage'])->name('delete.image');
});

// Route profile
Route::get('profil/{id}', [UserController::class, 'profil'])->name('profil');
Route::post('update_profil/{id}', [UserController::class, 'update_profil'])->name('update_profil');
Route::post('update_foto_profil/{id}', [UserController::class, 'update_foto_profil'])->name('update_foto_profil');
Route::get('/delete-image-profil/{id}', [UserController::class, 'deleteImage'])->name('delete.image.profil');
Route::post('/ubah-password/{id}', [UserController::class, 'updatePassword'])->name('ubah_password');
