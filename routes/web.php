<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayerController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;



Route::middleware([CheckIsNotLogged::class])->group(

    function () {
        Route::GET('/signin', [UserController::class, 'signIn'])->name('signin');
        Route::POST('/signInSubmit', [UserController::class, 'createUser'])->name('signin.submit');
        Route::POST('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');
        Route::GET('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/guest-login', [AuthController::class, 'guestLogin'])->name('guest.login');

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
        Route::get('/teams/logo/{id}', function ($id) {
            $team = App\Models\Team::findOrFail($id);
            return '<img src="data:image/png;base64,' . base64_encode($team->team_symbol) . '" />';
        })->name('teams.logo');
        Route::get('/jogadores/{time_id}', [PlayerController::class, 'list'])->name('jogadores.list');
        Route::get('/jogadores/{time_id}/create', [PlayerController::class, 'create'])->name('jogadores.create');
        Route::post('/jogadores/{time_id}', [PlayerController::class, 'store'])->name('jogadores.store');
        Route::get('/jogadores/editar/{id}', [PlayerController::class, 'edit'])->name('jogadores.edit');
        Route::put('/jogadores/{id}', [PlayerController::class, 'update'])->name('jogadores.update');
        Route::delete('/jogadores/{id}', [PlayerController::class, 'destroy'])->name('jogadores.destroy');
    }
);



Route::GET('/home', [MainController::class, 'home'])->name('home');
Route::GET('/listAdmins', [UserController::class, 'list'])->name('listAdmins');
Route::GET('/findAdmin/{user}', [UserController::class, 'find'])->name('findAdmin');

Route::MATCH(['get', 'post', 'put'], '/updateAdmin/{user}', [UserController::class, 'update'])->name('updateAdmin');
Route::put('/updateUserSubmit/{id}', [UserController::class, 'updateUser'])
    ->name('updateUser.submit');
