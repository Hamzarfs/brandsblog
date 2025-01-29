<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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

// web
Route::redirect('/', 'admin/dashboard');

// Auth routes
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', fn() => view('dashboard'))->name('dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('tags', TagController::class);
        Route::resource('blogs', BlogController::class);
    });
});

Route::prefix('artisan')->controller(ArtisanController::class)->group(function () {
    Route::get('migrate', 'migrate');
    Route::get('migrateSeed', 'migrateSeed');
    Route::get('migrate/fresh', 'migrateFresh');
    Route::get('migrate/fresh-seed', 'migrateFreshSeed');
    Route::get('seed', 'seed');
    Route::get('symbolicLink', 'symbolicLink');
});
