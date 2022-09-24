<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BranchesController;



Route::controller(BranchesController::class)->prefix('branch')->group(function () {
    Route::get('/', 'index')->name('branch');
    Route::post('/add', 'store')->name('branch.add');
    Route::delete('users/{id}', 'destroy')->name('branch.delete');
});