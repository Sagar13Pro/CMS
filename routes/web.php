<?php

use App\Http\Controllers\TrackList;
use App\Http\Controllers\UserCompController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\UserRegistration;
use App\Models\userComp;
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
// Main Routes 

/*

// User Routes
Route::view('UserLogin', 'user/UserLogin');
Route::view('UserRegister', 'user/UserReg');

// Admin Routes
*/

Route::view('AdminDash', 'admin/AdminDash');

Route::view('AdminCompList', 'admin/ComplaintList');

Route::view('UpdateComplaint', 'admin/UpdateComplaint');

Route::view('MergeComplaint', 'admin/MergeComplaint');

Route::view('AdminLogin', 'admin/AdminLogin');

Route::view('AdminRegister', 'admin/AdminReg');
/*
//User
Route::post('RegisterData', [UserRegistration::class, 'Main']);
Route::post('userlogincre', [UserLogin::class, 'Userlogin']);
Route::post('getComplaintDetails', [UserCompController::class, 'validateDetails']);
//Details For Pop-Up
Route::get('/UserCompList/{id}', [TrackList::class, 'FetchDetails'])->where('id', '[0-9]+');
//Middleware
Route::group(['middleware' => 'CheckSession'], function () {
    Route::view('/Dashboard/', 'user/UserDash');
    Route::view('/UserCompList', 'user/ComplaintList');
    Route::view('/NewComplaint', 'user/NewComplaint');
    Route::view('/TrackComplaint', 'user/TrackComplaint');
    Route::get('/UserCompList', [TrackList::class, 'FetchComplaints']);
});*/
//Logut section
Route::get('/logout', function () {
    if (session()->has('session_mail')) {
        session()->flush();
    }
    return redirect(route('login.view'));
});
///New
Route::get('/', function () {
    return view('index');
});
//Login
Route::get('/user/login', [UserController::class, 'Login'])->name('login.view');
Route::post('/user/login/validate', [UserController::class, 'ValidateUser'])->name('user.validation');
//Google Registration,Login
Route::get('/user/login/google/', [UserController::class, 'redirectToProviderGoogle'])->name('login.google');
Route::get('/callback/google/', [UserController::class, 'HandlerProviderGoogle']);
//Registration
Route::get('/user/register', [UserController::class, 'Register'])->name('register.view');
Route::post('/user/regsitration/store', [UserController::class, 'store'])->name('registration.store');

//middle
Route::group(['middleware' => 'CheckSession'], function () {
    Route::get('/dashboard', [UserController::class, 'Dashboard'])->name('dashboard.user');
    Route::get('dashboard/complaintlist', [UserController::class, 'ComplaintList'])->name('complaintlist.view');
    Route::get('/UserCompList/{id}', [UserController::class, 'FetchListRow']);
    Route::get('/dashboard/newcomplaint', [UserController::class, 'NewComplaint'])->name('newcomplaint.view');
    Route::post('/dashboard/newcomplaint/store', [UserController::class, 'ComplaintStore'])->name('newcomplaint.store');
    Route::get('dashboard/trackcomplaint', [UserController::class, 'TrackComplaint'])->name('trackcomplaint.view');
    Route::get('/tracklist/{id}', [UserController::class, 'Track']);
});
