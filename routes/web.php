<?php

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

Route::get('/', function () {
    return inertia('Home');
});

//###Admin
//Import user by CSV
Route::get('/admin/createUserByCSV', [\App\Http\Controllers\AdminAccountController::class, 'createUserByCSV']);
Route::post('/admin/createUserByCSV', [\App\Http\Controllers\AdminAccountController::class, 'storeUserByCSV']);
