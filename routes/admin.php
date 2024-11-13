<?php 


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\EMIController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/login', 'create')->name('admin.create');
    Route::post('/admin/login', 'login')->name('admin.login');
});

 // Admin All Route
 Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.index');
            Route::get('/logout', 'adminLogout')->name('adminLogout');
            Route::get('/profile', 'adminProfile')->name('admin.profile');
            Route::get('/edit/profile', 'adminEditProfile')->name('admin.editprofile');
            Route::post('/update/profile', 'adminUpdateProfile')->name('admin.update.profile');      
            Route::get('/clear-cache', 'clearCache')->name('clear.cache');
        });
        
    // LoanController 
    Route::controller(LoanController::class)->group(function () {
        Route::get('/loan-details', 'index')->name('loan.admin.index');
    });

    // EMIController 
    Route::controller(EMIController::class)->group(function () {
        Route::get('/emi-processing', 'show')->name('emi.show');
        Route::post('/emi-processing', 'processData')->name('emi.process-data');
        Route::get('/emi-details', 'showEmiDetails')->name('emi.details-data');
    });

}); // Admin Middleware End

