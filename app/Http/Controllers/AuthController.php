<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    //Método para fazer login
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){
        // Validação
        // dd($request);

        $request->validate([
            'text_username' => 'required|email',
            'text_password' => 'required',
        ]);

        $username = $request->input('text_username');
        $password = $request->input('text_password');
        return "OK";
        // echo "Usuário: " .$username . "<br>";
        // echo "Password: " .$password;

    }

    //Método para fazer logout
    public function logout(){
        echo 'logout';
    }
}
