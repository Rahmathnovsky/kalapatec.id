<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\UserManagementController;

use App\Http\Controllers\TrialReqOverviewController;
use App\Http\Controllers\TrialReqListController;

use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\PostAdminController;
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
Route::resource('/article', ArticleController::class);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin');

    // User
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');
    Route::post('/user-management', [UserManagementController::class, 'store'])->name('user-management.store');
    Route::put('/user-management/{id}', [UserManagementController::class, 'update'])->name('user-management.update');
    Route::get('/user-management/{id}', [UserManagementController::class, 'destroy'])->name('user-management.destroy');
    
    // Category 
    Route::resource('category', CategoryController::class);

    // Post
    Route::resource('post', PostAdminController::class);

    Route::get('/demo-trial/overview', [TrialReqOverviewController::class, 'index'])->name('overview');
    Route::get('/demo-trial/list', [TrialReqListController::class, 'index'])->name('request-list');

    Route::get('/get-in-touch', [GetInTouchController::class, 'index'])->name('get-in-touch');
});

