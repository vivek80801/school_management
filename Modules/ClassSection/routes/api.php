<?php

use Illuminate\Support\Facades\Route;
use Modules\ClassSection\Http\Controllers\ClassSectionController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('classsections', ClassSectionController::class)->names('classsection');
});
