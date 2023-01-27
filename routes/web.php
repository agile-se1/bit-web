<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\HashAuthController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\EmailController;
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
    Route::get('/admin/createUserByCSV', [AdminController::class, 'createUserByCSV']);
    Route::post('/admin/createUserByCSV', [AdminController::class, 'storeUserByCSV']);

    //User data
    Route::get('/admin/user', [AdminController::class, 'indexUser']);
});

//Fallback route, if the user is not logged in
Route::get('/noticeToLogin', [HashAuthController::class, 'showNoticeToLogin'])->name('noticeToLogin');

//Test routes
Route::get('/showAuthData', [TestSitesController::class, 'showAuthData']);
Route::get('/testLoginLinks', [TestSitesController::class, 'testLoginLinks']);

