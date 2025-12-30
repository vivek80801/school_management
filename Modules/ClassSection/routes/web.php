<?php

use Illuminate\Support\Facades\Route;
use Modules\ClassSection\Http\Controllers\ClassSectionController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('classsections', ClassSectionController::class)->names('classsection');
});
