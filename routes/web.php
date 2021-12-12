<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/account', [UserController::class, 'startAuthProcess'])->middleware('isUnauth');

Route::post('/register', [UserController::class, 'createUser'])->middleware('isUnauth');
Route::post('/login', [UserController::class, 'authenticateUser'])->middleware('isUnauth');

Route::get('/dashboard', [DashboardController::class, "showDashboard"])->middleware('isAuth');
Route::post('/sendFeedback', [DashboardController::class, "sendFeedbackHandler"])->middleware('isAuth');

Route::get('/logout', [DashboardController::class, "logout"])->middleware('isAuth');

Route::get('/', function () {
    return view('home');
});

