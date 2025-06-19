<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\UserManagementController;

use App\Http\Controllers\TrialReqOverviewController;
use App\Http\Controllers\TrialReqListController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeAdminController::class, 'index'])->name('admin');

Route::get('/admin/user-management', [UserManagementController::class, 'index'])->name('user-management');

Route::get('/admin/demo-trial/overview', [TrialReqOverviewController::class, 'index'])->name('overview');
Route::get('/admin/demo-trial/list', [TrialReqListController::class, 'index'])->name('request-list');
