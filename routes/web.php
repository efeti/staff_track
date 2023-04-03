<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
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
})->name('index')->middleware('auth');



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/verify', [Authcontroller::class, 'verify'])->name('verify');
Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');
Route::get('/mark_attendance', [AttendanceController::class, 'mark_attendance'])
->name('mark_attendance')->middleware('auth');
Route::post('/submit_attendance', [AttendanceController::class, 'submit_attendance'])
->name('submit_attendance')->middleware('auth');
Route::get('/view_attendance', [AttendanceController::class, 'view_attendance'])
->name('view_attendance')->middleware('auth');
Route::post('/submit_view_attendance', [AttendanceController::class, 'submit_view_attendance'])
->name('submit_view_attendance')->middleware('auth');
Route::get('/payments', [AttendanceController::class, 'payments'])
->name('payments')->middleware('auth');
Route::post('/submit_payments', [AttendanceController::class, 'submit_payments'])
->name('submit_payments')->middleware('auth');