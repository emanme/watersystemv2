<?php



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\FieldMeterReadingController;

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

Route::post('/waterbill/process', [APIController::class, 'save_reading']);
 
 
Route::get('/students', [StudentController::class, 'index']);


