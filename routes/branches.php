<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BranchesController;



Route::controller(BranchesController::class)->prefix('branch')->group(function () {
    Route::get('/', 'index')->name('branch');
    
    Route::get('/trashed', 'branchesTrashed')->name('branchesTrashed');

    Route::post('/add', 'store')->name('branch.add');

    Route::delete('softdelete/{id}', 'destroy')->name('branch.delete');

    Route::delete('harddelete/{id}', 'hdelete')->name('branch.hdelete');
});