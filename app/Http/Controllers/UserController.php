<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function signIn(){
        return view('user.signin');
    }

    public function createUser(Request $request){

        $request->validate([
            'text_username' => 'required|email',
            'text_password' => 'required|min:6|max:12',
        ],
        [
            //Mensagem para text_username
            'text_username.required' => 'O campo de e-mail é obrigatório',
            'text_username.email' => 'O campo de e-mail deve conter um endereço válido',

            //Mensagem para text_password
            'text_password.required' => 'A senha é obrigatória',
            'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
            'text_password.max' => 'A senha deve ter no máximo :max caracteres',

        ]
    );

    $username = $request->text_username;
    $password = Hash::make($request->password);

    DB::table('users')->insert([
            [
                'username'  =>  $username,
                'password'  =>  $password,
                'created_at'    => now(),
            ]
        ]
    );

    return redirect('/home')->with('sucess', 'Usuário cadastrado com sucesso!');

    }

}
