<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminCSVController;
use App\Http\Controllers\admin\AdminUserManipulationController;
use App\Http\Controllers\admin\EmailController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\HashAuthController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\StaticSitesController;
use App\Http\Controllers\TestSitesController;
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

//Static sites
Route::get('/', [StaticSitesController::class, 'showHome']);
Route::get('/home', [StaticSitesController::class, 'showHome']);


//Auth User
Route::get('/login/{hash}', [HashAuthController::class, 'hashLogin']);
Route::get('/logout', [HashAuthController::class, 'logout']);

//User sites
Route::middleware('auth')->group(function (){
    //Insert here every route that need user login
    Route::get('/decision',[DecisionController::class, 'index']);
    //Saves the decision
    Route::post('/decision', [DecisionController::class, 'store']);
    Route::put('/decision', [DecisionController::class, 'update']);
});

//Emails
Route::get('/admin/email/sendNewLoginLinkMail/{first_name}/{surname}', [EmailController::class, 'sendNewLoginLinkMailByFirstAndSurname']);

//Auth Admin
Route::get('/admin/login', [AdminAuthController::class, 'showAdminLogin']);
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout']);

//Admin sites
Route::middleware('auth:admin')->group(function (){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth:admin');

    //Send Mails
    Route::get('/admin/email/sendLoginLinkMailToAllUsers', [EmailController::class, 'sendLoginLinkMailToAllUsers']);
    Route::get('/admin/email/sendBeforeBITMailToAllUsers', [EmailController::class, 'sendBeforeBITMailToAllUsers']);
    Route::get('/admin/email/sendDecisionReminderMailToAllUsers', [EmailController::class, 'sendDecisionReminderMailToAllUsers']);

    //Import user by CSV
    Route::get('/admin/createUserByCSV', [AdminCSVController::class, 'createUserByCSV']);
    Route::post('/admin/createUserByCSV', [AdminCSVController::class, 'storeUserByCSV']);

    //User data
    Route::get('/admin/user', [AdminUserManipulationController::class, 'index']);
    Route::get('/admin/user/{user}/edit', [AdminUserManipulationController::class, 'edit']);
    Route::post('/admin/user/{user}/update', [AdminUserManipulationController::class, 'update']);
    Route::get('/admin/user/{user}/newLoginLink', [EmailController::class, 'sendNewLoginLinkToUser']);
    Route::get('/admin/user/{user}/delete', [AdminUserManipulationController::class, 'delete']);
    Route::get('/admin/user/create', [AdminUserManipulationController::class, 'create']);
    Route::post('/admin/user/store', [AdminUserManipulationController::class, 'store']);

    //Reset Website
    Route::get('/admin/reset', [AdminController::class, 'resetWebsite']);
});

//Fallback route, if the user is not logged in
Route::get('/noticeToLogin', [HashAuthController::class, 'showNoticeToLogin'])->name('noticeToLogin');

//Test routes
Route::get('/showAuthData', [TestSitesController::class, 'showAuthData']);
Route::get('/testLoginLinks', [TestSitesController::class, 'testLoginLinks']);

