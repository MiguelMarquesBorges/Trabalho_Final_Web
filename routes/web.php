<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamsController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;



Route::middleware([CheckIsNotLogged::class])->group(

    function () {
        Route::GET('/signin', [UserController::class, 'signIn'])->name('signin');
        Route::POST('/signInSubmit', [UserController::class, 'createUser'])->name('signin.submit');
        Route::POST('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');
        Route::GET('/login', [AuthController::class, 'login'])->name('login');
        
    }
);

Route::middleware([CheckIsLogged::class])->group(
    
    function () {
        Route::POST('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/times/create', [TeamsController::class, 'create'])->name('times.create');
        Route::post('/times/store', [TeamsController::class, 'store'])->name('times.store');
        Route::get('/times', [TeamsController::class, 'index'])->name('times.list');
        Route::get('/times/remove', [TeamsController::class, 'removeView'])->name('times.remove');
        Route::delete('/times/{id}', [TeamsController::class, 'destroy'])->name('times.destroy');
        Route::get('/times/{id}/edit', [TeamsController::class, 'edit'])->name('times.edit');
        Route::put('/times/{id}', [TeamsController::class, 'update'])->name('times.update');
        
    }
);



Route::GET('/home', [MainController::class, 'home'])->name('home');
Route::GET('/listAdmins', [UserController::class, 'list'])->name('listAdmins');
Route::GET('/findAdmin/{user}', [UserController::class, 'find'])->name('findAdmin');

Route::MATCH(['get', 'post', 'put'], '/updateAdmin/{user}', [UserController::class, 'update'])->name('updateAdmin');
Route::put('/updateUserSubmit/{id}', [UserController::class, 'updateUser'])
    ->name('updateUser.submit');
