<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\applicant\ClearanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/application', [ClearanceController::class, 'createStep1']);
Route::post('/application/create-step1', [ClearanceController::class, 'postCreateStep1']);

Route::get('/application/create-step2', [ClearanceController::class, 'createStep2']);
Route::post('/application/create-step2', [ClearanceController::class, 'postCreateStep2']);

Route::get('/application/create-step3', [ClearanceController::class, 'createStep3']);
Route::post('/application/create-step3', [ClearanceController::class, 'postCreateStep3']);
