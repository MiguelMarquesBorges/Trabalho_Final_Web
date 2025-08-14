<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::GET('/login', [AuthController::class, 'login'])->name('login');

Route::GET('/logout', [AuthController::class, 'logout'])->name('logout');


