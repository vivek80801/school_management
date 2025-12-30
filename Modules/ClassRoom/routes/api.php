<?php

use Illuminate\Support\Facades\Route;
use Modules\ClassRoom\Http\Controllers\ClassRoomController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('classrooms', ClassRoomController::class)->names('classroom');
});
