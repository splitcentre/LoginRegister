<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserMailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
   });

Route::get('/users', [UserMailController::class, 'index'])->name('users');
Route::get('/send-mail', [MailController::class, 'index'])->name('send-email');
Route::post('/post-email', [MailController::class, 'store'])->name('post-email');