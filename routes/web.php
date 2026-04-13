<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\Admin\LeaveApprovalController;


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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

});

Route::middleware(['auth'])->group(function () {

    Route::get('/leave/create', [LeaveRequestController::class, 'create'])->name('leave.create');
    Route::post('/leave/store', [LeaveRequestController::class, 'store'])->name('leave.store');

});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

});

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/leave-requests', [LeaveApprovalController::class, 'index']);
    Route::post('/admin/leave/{id}/approve', [LeaveApprovalController::class, 'approve']);
    Route::post('/admin/leave/{id}/reject', [LeaveApprovalController::class, 'reject']);

});

Route::middleware(['auth'])->group(function () {

    Route::get('/my-requests', [LeaveRequestController::class, 'myRequests'])->name('leave.my');

});





Route::get('/', function () {
    return view('welcome');
});
