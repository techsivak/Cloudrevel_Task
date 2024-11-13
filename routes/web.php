<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoanController;

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

Route::get('/', function () {
    return redirect()->route('admin.index');
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/admin/login', 'create')->name('admin.create');
})->middleware(['auth', 'verified']);

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'create')->name('dashboard');
})->middleware(['auth', 'verified']);



require __DIR__ . '/auth.php';
