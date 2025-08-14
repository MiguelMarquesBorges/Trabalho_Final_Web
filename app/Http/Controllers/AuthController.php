<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Método para fazer login
    public function login(){
        return view('login');
    }

    //Método para fazer logout
    public function logout(){
        echo 'logout';
    }
}
