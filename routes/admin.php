<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/profile', [AdminProfileController::class, 'profile'])->name('admin.profile');

    Route::get('/profile/edit', [AdminProfileController::class, 'profileEdit'])->name('admin.profile.edit');

    Route::post('/profile/update', [AdminProfileController::class, 'profileUpdate'])->name('admin.profile.update');

    Route::get('/change/pass', [AdminProfileController::class, 'changePassword'])->name('admin.change.password');

    Route::post('/update/pass', [AdminProfileController::class, 'UpdatePassword'])->name('admin.update.password');

    Route::get('/admin/dashboard', [AdminProfileController::class, 'changePassword'])->name('admin.change.password');

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    
});

Route::prefix('admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});
