<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CentersController;



Route::controller(CentersController::class)->prefix('certer')->group(function () {
    Route::get('/centers/{branch}', 'index')->name('certer');
    
    Route::get('/certersTrashed', 'centeresTrashed')->name('centeresTrashed');

    Route::post('/add/{branch}', 'store')->name('certer.add');

    Route::delete('softdelete/{id}', 'destroy')->name('certer.delete');

    Route::delete('harddelete/{id}', 'hdelete')->name('certer.hdelete');
});