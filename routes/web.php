<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthorizedUserOnlyAccess;

Route::get('/', [UserController::class, 'systemLogin']);

Route::post('/login', [UserController::class, 'processLogin']);

//Dashboard and Admin Area Routes
Route::prefix('admin')->group(function () {

    Route::get('/logout', [UserController::class, 'logout']);
    

    Route::middleware(AuthorizedUserOnlyAccess::class)->group(function(){
        Route::get('/dashboard', [UserController::class, 'dashboard']);
        Route::get('/profile', [UserController::class, 'profile']);
        Route::get('/change-password', [UserController::class, 'changePassword']);
    });

});
