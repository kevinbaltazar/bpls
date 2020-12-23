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
    return view('home');
});

Route::get('/faqs', function () {
    return view('faqs');
});



Route::get('/application', [ClearanceController::class, 'createStep1']);
Route::post('/application/first', [ClearanceController::class, 'postCreateStep1']);

Route::get('/application/second', [ClearanceController::class, 'createStep2']);
Route::post('/application/second', [ClearanceController::class, 'postCreateStep2']);

Route::get('/application/third', [ClearanceController::class, 'createStep3']);
Route::post('/application/third', [ClearanceController::class, 'postCreateStep3']);

