<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){

        $request->validate([
            'text_username' => 'required|email',
            'text_password' => 'required|min:6|max:12',
        ],
        [
            'text_username.required' => 'O campo de e-mail é obrigatório!',
            'text_username.email' => 'O campo de e-mail deve conter um endereço válido!',

            'text_password.required' => 'A senha é obrigatória!',
            'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
            'text_password.max' => 'A senha deve ter no máximo :max caracteres',
        ]);

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        try{
            DB::connection()->getPdo();
            echo "Conexão feita com sucesso!";
        } catch(\PDOException $e){
            echo "A conexão falhou: " . $e->getMessage();
        }


    }

    public function logout(){
        echo 'logout';
    }
}
