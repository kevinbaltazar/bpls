<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\SessionsController;
use App\Http\Controllers\Admin\ClearanceController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Models\Admin;
use App\Http\Controllers\Admin\PrintClearanceController;
use App\Http\Controllers\ContactUsController;
use App\Models\Clearance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\auditController;
use GuzzleHttp\Middleware;

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

Route::get('admin/audits', [auditController::class, 'index'])->name('audit');

Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('admins', AdminController::class);
Route::resource('clearances', ClearanceController::class)->only(['index', 'show', 'update']);
Route::post('clearances/{clearance}/print', PrintClearanceController::class)->name('clearances.print');

Route::get('search', [ClearanceController::class, 'search'])->name('search-c');
Route::get('dashboard/search', [DashboardController::class, 'search'])->name('search');
// Remove this
Route::view('test', 'admin.clearances.pdf', ['clearance' => Clearance::first()]);


Route::get('setting', [GeneralSettingsController::class, 'showSettingPage'])->name('setting');
Route::post('setting', [GeneralSettingsController::class, 'update'])->name('setting');


Route::get('login', [SessionsController::class, 'showLoginPage'])->name('login');
Route::post('login', [SessionsController::class, 'login']);
Route::post('logout', [SessionsController::class, 'logout'])->name('logout');

Route::get('dashboard/approved',  [DashboardController::class, 'showapproved'])->name('approved');
Route::get('dashboard/received',  [DashboardController::class, 'showreceived'])->name('received');
Route::get('dashboard/rejected',  [DashboardController::class, 'showrejected'])->name('rejected');
Route::get('dashboard/renewed',  [DashboardController::class, 'showrenewed'])->name('renewed');

Route::get('admin/messages',  [ContactUsController::class, 'show'])->name('messages');
Route::get('admin/reports',  [ReportController::class, 'index'])->name('reports');


