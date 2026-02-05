<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group([
        'prefix' => 'roles',
        'as' => 'roles.',
        'controller' => RoleController::class,
    ], function () {
        Route::get('/permission/{role}', 'permissions')->name('permissions');
        Route::post('/permission', 'assignPermissions')->name('assignpermission');
    });

    Route::resource('roles', RoleController::class);
    Route::group([
        'prefix' => 'users',
        'controller' => UserController::class,
        'as' => 'users.',
    ], function () {
        Route::get('/roles/{user}', 'roles')->name('roles');
        Route::get('/assign/role/{user}', 'assignRole')->name('roles.assign');
        Route::post('/assign/role', 'roleAssign')->name('roles.roleassign');
    });

    Route::resource('users', UserController::class);
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
