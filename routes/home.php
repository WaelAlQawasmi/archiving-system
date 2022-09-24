<?php
use App\Models\user_profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->prefix('home')->group(function () {
    Route::get('/', 'index')->name('home');;
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::put('/home/editprofile/',[UserProfileController::class,'update'])->name('home.editprofile');
