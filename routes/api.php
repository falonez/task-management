<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TaskControllerApi;
use App\Http\Controllers\api\AuthController;
use Spatie\Activitylog\Models\Activity;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    
    'middleware' => 'api',
    'prefix' => 'auth'
    
], function ($router){
    Route::post('Login', [AuthController::class, 'login']);
    // Route::post('Register', [AuthController::class, 'register']);
    // Route::post('Logout', [AuthController::class, 'logout']);
    // Route::post('Refresh', [AuthController::class, 'refresh']);
});

Route::middleware('auth')->group(function(){      
        Route::apiResource('/task', TaskControllerApi::class);
        Route::get('/userTask/{id}', [TaskControllerApi::class, 'userTask']);
});
