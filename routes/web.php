<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;



Route::middleware([CheckIsNotLogged::class])->group(

    function(){
        Route::GET('/login', [AuthController::class, 'login'])->name('login');
        Route::POST('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');
        
        Route::GET('/signin', [AuthController::class, 'signIn'])->name('signin');
        Route::POST('/signInSubmit', [AuthController::class, 'signInSubmit'])->name('signin.submit');

    }
);

Route::middleware([CheckIsLogged::class])->group(

    function(){
        Route::GET('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);

Route::GET('/home', [MainController::class, 'home'])->name('home');


