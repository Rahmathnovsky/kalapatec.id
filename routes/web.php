<?php

use App\Enums\UserRole;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\UserManagementController;

use App\Http\Controllers\TrialReqOverviewController;
use App\Http\Controllers\TrialReqListController;

use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\PostAdminController;
use App\Http\Controllers\RequestController;
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
Route::group(['middleware' => ['setLocale']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/article', ArticleController::class)->except(['show']);
    Route::get('/article/{id}/{slug}',[ ArticleController::class, 'show'])->name('article.show');
    Route::post('/demo-trial', [RequestController::class, 'store'])->name('demo-trial.store');
    Route::post('/candidate', [CandidateController::class, 'store'])->name('candidate.store');
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

    // Excel export
    Route::get('/export', [ExcelController::class, 'export'])->name('export');
    
    // Career
    Route::resource('/career', CareerController::class);
    
    // Candidate
    Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate.index');
    Route::delete('/candidate/{id}', [CandidateController::class, 'destroy'])->name('candidate.destroy'); 
    Route::get('/download/{candidateName}/{fileName}', [CandidateController::class, 'downloadFile'])->name('download');
});

