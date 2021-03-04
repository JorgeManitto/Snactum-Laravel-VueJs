<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// ->middleware('auth:sanctum')
Route::post('/signup',[AuthController::class,'signup']);
Route::post('/signin',[AuthController::class,'signin']);

Route::get('/test/all',[TestController::class,'all']);
Route::get('/test/user',[TestController::class,'user']);
Route::get('/test/mod',[TestController::class,'mod']);
Route::get('/test/admin',[AdminController::class,'admin']);
Route::get('/test/admin/{email}',[AdminController::class,'edit']);


// Route::delete('logout',[LoginController::class,'logout']);