<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup',[UserController::class, 'store']);
Route::post('login', [AuthenticationController::class,'login']);

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function (){
    Route::post('logout', [AuthenticationController::class, 'logout']);
});

//Route::group(['middleware' => ['role:admin']], function (){
Route::group(['middleware' => ['permission:manipolate-exercise']], function (){
    Route::post('ins-esercizio', [GymController::class,'store_exercise']);
    Route::delete('delete-esercizio/{id_exercise}', [GymController::class,'delete_exercise']);
    Route::post('up-esercizio', [GymController::class,'update_exercise']);


});

Route::group(['middleware' => ['permission:manipolate-role']], function (){
Route::put('up-role/{id}', [UserController::class,'update']);
});

Route::group(['middleware' => ['role:atleta']], function (){
    Route::post('ins-monitoraggio', [GymController::class, 'store_monitoraggio']);

});

