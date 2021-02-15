<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\applicant\ClearanceController;
use App\Http\Controllers\applicant\ClearanceRenewController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ReportController;

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

Route::get('/FAQs', function () {
    return view('faqs');
});

Route::get('/AboutUs', function () {
    return view('about-us');
});

Route::get('/ContactUs', function () {
    return view('contact-us');
});
Route::post('/ContactUs', [ContactUsController::class, 'insert']);

Route::get('/application/first', [ClearanceController::class, 'createStep1']);
Route::post('/application/first', [ClearanceController::class, 'postCreateStep1']);

Route::get('/application/second', [ClearanceController::class, 'createStep2']);
Route::post('/application/second', [ClearanceController::class, 'postCreateStep2']);

Route::get('/application/third', [ClearanceController::class, 'createStep3']);
Route::post('/application/third', [ClearanceController::class, 'postCreateStep3']);

Route::get('/renew/first', [ClearanceRenewController::class, 'createRenewStep1']);
Route::post('/renew/first', [ClearanceRenewController::class, 'postCreateRenewStep1']);

Route::get('/renew/second', [ClearanceRenewController::class, 'createRenewStep2']);
Route::post('/renew/second', [ClearanceRenewController::class, 'postCreateRenewStep2']);

Route::get('admin/audits', function(){
    return view('admin/clearances/audit');
});

Route::POST('admin/admin/reports',  [ReportController::class, 'filter'])->name('filter');
Route::get('admin/export',  [ReportController::class, 'exportPDF'])->name('exportPDF');

