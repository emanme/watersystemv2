<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WaterBillController;
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

Route::post('/waterbill/process', [WaterBillController::class, 'processWaterBill']);
Route::post('/students', [StudentController::class, 'index']);
Route::get('/students', [StudentController::class, 'index']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
