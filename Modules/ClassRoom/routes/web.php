<?php

use Illuminate\Support\Facades\Route;
use Modules\ClassRoom\Http\Controllers\ClassRoomController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('classrooms', ClassRoomController::class)->names('classroom');
});
