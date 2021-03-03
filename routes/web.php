<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
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
    return view('index');
});
// User Routes
Route::get('/user/login', [UserController::class, 'Login'])->name('user.login.view');
Route::post('/user/login/validate', [UserController::class, 'ValidateUser'])->name('user.validation');
//Google Registration,Login
Route::get('/user/login/google/', [UserController::class, 'redirectToProviderGoogle'])->name('user.login.google');
Route::get('/callback/google/', [UserController::class, 'HandlerProviderGoogle']);
//Registration
Route::get('/user/register', [UserController::class, 'Register'])->name('register.view');
Route::post('/user/regsitration/store', [UserController::class, 'store'])->name('registration.store');

//middle
Route::group(['middleware' => 'CheckSession'], function () {
    Route::get('user/dashboard', [UserController::class, 'Dashboard'])->name('dashboard.user');
    Route::get('dashboard/complaintlist', [UserController::class, 'ComplaintList'])->name('complaintlist.view');
    Route::get('/UserCompList/{id}', [UserController::class, 'FetchListRow']);
    Route::get('/dashboard/newcomplaint', [UserController::class, 'NewComplaint'])->name('newcomplaint.view');
    Route::post('/dashboard/newcomplaint/store', [UserController::class, 'ComplaintStore'])->name('newcomplaint.store');
    Route::get('dashboard/trackcomplaint', [UserController::class, 'TrackComplaint'])->name('trackcomplaint.view');
    Route::get('/tracklist/{id}', [UserController::class, 'Track']);
});
//Logout section
Route::get('/logout', function () {
    if (session()->has('session_mail')) {
        session()->flush();
    }
    return redirect(route('user.login.view'));
});
//End User Routes

//Admin Routes
Route::get('admin/login', [AdminController::class, 'Login'])->name('admin.login.view');
Route::get('admin/registration', [AdminController::class, 'Register'])->name('admin.register.view');
//Middleware
Route::group(['middleware' => 'AdminSession'], function () {
    Route::get('admin/dashboard/', [AdminController::class, 'Dashboard'])->name('admin.dashboard.view');
});
//Register Validation and store
Route::post('admin/registration/store', [AdminController::class, 'Store'])->name('admin.register.store');
//Admin Login Validation
Route::post('admin/login/validate', [AdminController::class, 'ValidateAdmin'])->name('admin.login.validate');
Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
//End Admin Routes
