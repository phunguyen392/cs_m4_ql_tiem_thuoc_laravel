<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\ApiAuthController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('category', [ApiController::class,'categoryIndex']);

Route::get('product', [ApiController::class,'productIndex']);
Route::get('product/show/{id}', [ApiController::class,'productShow']);

Route::get('/register' ,[ApiAuthController::class,'register']);

Route::post('/login', [ApiAuthController::class, 'login']);
Route::get('/logout', [ApiAuthController::class, 'logout']);






