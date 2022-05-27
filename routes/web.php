<?php

use App\Http\Controllers\frontend\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\UserProfileController;


/**
 * User Routes
 */

 Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/profile', [UserProfileController::class, 'profilePage'])->name('user.profile');
    Route::get('/logout', [UserProfileController::class, 'Logout'])->name('user.logout'); 
    Route::post('/update/profile', [UserProfileController::class, 'updateProfile'])->name('user.update.profile');
    Route::post('/update/password', [UserProfileController::class, 'updatePassword'])->name('user.update.password');
    Route::get('/change/password', [UserProfileController::class, 'changePasswordPage'])->name('user.change.password.page');
 });

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

Route::get('/', [IndexController::class, 'index']);

Route::get('/web/dashboard', [IndexController::class, 'index'])->name('home');

