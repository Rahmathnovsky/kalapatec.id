<?php

use App\Enums\UserRole;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\UserManagementController;

use App\Http\Controllers\TrialReqOverviewController;
use App\Http\Controllers\TrialReqListController;

use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\PostAdminController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::group(['middleware' => ['setLocale']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/article', ArticleController::class)->except(['show']);
    Route::get('/article/{id}/{slug}',[ ArticleController::class, 'show'])->name('article.show');
    Route::post('/demo-trial', [RequestController::class, 'store'])->name('demo-trial.store');
});

Route::get('/lang/{lang}', function($lang){
    if(in_array($lang,['en','id'])){
        session(['locale'=> $lang]);
    }
    return back();
})->name('change-language');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin');

    // User
    Route::middleware(['roles:' . UserRole::ADMINISTRATOR])->group(function() {
        Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');
        Route::post('/user-management', [UserManagementController::class, 'store'])->name('user-management.store');
        Route::put('/user-management/{id}', [UserManagementController::class, 'update'])->name('user-management.update');
        Route::get('/user-management/{id}', [UserManagementController::class, 'destroy'])->name('user-management.destroy');
    });
    
    // Category 
    Route::resource('category', CategoryController::class);

    // Post
    Route::resource('post', PostAdminController::class)->except(['show']);

    // Demo/Trial
    Route::resource('demo-trial', RequestController::class)->except(['store', 'create', 'edit']);
    Route::get('/demo-trial/overview', [TrialReqOverviewController::class, 'index'])->name('overview');
    Route::get('/demo-trial/list', [TrialReqListController::class, 'index'])->name('request-list');

    // Excel export
    Route::get('/export', [RequestController::class, 'export'])->name('export');

    Route::get('/get-in-touch', [GetInTouchController::class, 'index'])->name('get-in-touch');
});

