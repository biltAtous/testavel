<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;



Route::get('/', function () {
    return view('welcome'); // Replace 'welcome' with the actual view you want to return
});


// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset']);


// Admin Authentication Routes...
// Route::prefix('admin')->group(function () {
//     Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

//     Route::middleware('admin')->group(function () {
//         Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
//         // Add more admin routes here
//     });
// });

// Route::group([
//     'as' => 'admin.',
//     'prefix' => 'admin',
//     'namespace' => 'App\Http\Controllers\Admin',
//     'middleware' => ['auth', 'admin']
// ], function() {
//     Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//     Route::get('dashboard', 'AdminController@index')->name('dashboard');
// });

// Route::group([
//     'as' => 'admin.',
//     'prefix' => 'admin',
//     'namespace' => 'App\Http\Controllers\Admin',
//     'middleware' => ['auth', 'admin']
// ], function() {
//     Route::get('login', 'AuthController@showLoginForm')->name('login');
//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout')->name('logout');

//     Route::get('dashboard', 'AdminController@index')->name('dashboard');
// });


// Route::group([
//     'as' => 'admin',
//     'prefix' => 'admin',
//     'namespace' => 'App\Http\Controllers\Admin',
//     'middleware' => ['auth', 'admin']
// ],function(){
//     Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
//     Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
// });

// Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AuthController::class, 'login']);
// Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});