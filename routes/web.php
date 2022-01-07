<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetupDatabase;
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

Route::get('/admin', [AdminController::class, "getLoginPage"])->middleware('isUnauth');
Route::post('/admin', [AdminController::class, "authenticate"])->middleware('isUnauth');
Route::get("/admin-dashboard", [AdminController::class, "showDashboard"])->middleware('isAuth');
Route::get("/usersList", [AdminController::class, "showUsersList"])->middleware("isAuth");
Route::get("/deleteUser", [AdminController::class, "deleteUser"])->middleware("isAuth");
Route::get("/deleteData", [AdminController::class, "deleteData"])->middleware("isAuth");
Route::post("/changeAdminPass", [AdminController::class, "changeAdminPass"])->middleware("isAuth");

Route::post('/register', [UserController::class, 'createUser'])->middleware('isUnauth');
Route::post('/login', [UserController::class, 'authenticateUser'])->middleware('isUnauth');

Route::get('/dashboard', [DashboardController::class, "showDashboard"])->middleware('isAuth');
Route::post('/sendFeedback', [DashboardController::class, "sendFeedbackHandler"])->middleware('isAuth');
Route::post("/update-profile", [DashboardController::class, "updateProfile"])->middleware('isAuth');

Route::get('/logout', [DashboardController::class, "logout"])->middleware('isAuth');

Route::get('/', function () {
    $hasStudent = SetupDatabase::setupStudentTable();
    $hasTeacher = SetupDatabase::setupTeacherTable();
    $hasFeedback = SetupDatabase::setupFeedbackTable();
    $hasAdmin = SetupDatabase::setupAdminTable();

    if($hasStudent && $hasTeacher && $hasFeedback && $hasAdmin) {
        return view('home');
    }
    else {
        return response("Database setup failed!", 500);
    }
})->middleware('isUnauth');

