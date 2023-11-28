<?php

use App\Http\Controllers\API\AchievementController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', function(){
    return response()->json([
        'message'   => 'Unauthorized',
    ]);
})->name('login');

Route::prefix('v1')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:api')->group(function(){
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/authUser', [AuthController::class, 'authUser']);

        Route::post('/employee-create', [EmployeeController::class, 'store']);
        Route::get('/employee-list', [EmployeeController::class, 'index']);

        Route::post('/department-create', [DepartmentController::class, 'store']);
        Route::post('/achievement-create', [AchievementController::class, 'store']);
    });
});


