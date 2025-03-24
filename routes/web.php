<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ChairmanDataController;

use App\Http\Middleware\AuthorizedUserOnlyAccess;
use App\Http\Middleware\RoleBasedAuthorizationChairman;

Route::get('/', [UserController::class, 'systemLogin']);

Route::post('/login', [UserController::class, 'processLogin']);

//Dashboard and Admin Area Routes
Route::prefix('admin')->group(function () {

    Route::get('/logout', [UserController::class, 'logout']);
    

    Route::middleware(AuthorizedUserOnlyAccess::class)->group(function(){

        Route::get('/dashboard', [UserController::class, 'dashboard']);
        Route::get('/profile', [UserController::class, 'profile']);
        Route::get('/change-password', [UserController::class, 'changePassword']);
        Route::post('/update-password', [UserController::class, 'updatePassword']);
        Route::get('/add-user', [UserController::class, 'addUserView']);
        Route::get('/user-list', [UserController::class, 'listUser']);
        Route::post('/add-user', [UserController::class, 'addUserPrcessing']);

        Route::get('/user-details/{id}', [UserController::class, 'viewUserDetails']);
        Route::get('/user-edit/{id}', [UserController::class, 'editUser']);
        Route::post('/update-user/{id}', [UserController::class, 'editUserProcessing']);

        Route::middleware(RoleBasedAuthorizationChairman::class)->group(function(){
            Route::get('/chairman-board-assignment', [ChairmanDataController::class, 'getBoardAssignment']);
            Route::get('/chairman-statistics', [ChairmanDataController::class, 'getStatistics']);
        });

    });

});
