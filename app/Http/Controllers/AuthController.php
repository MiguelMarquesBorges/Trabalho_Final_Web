<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
            //Mensagem para text_username
            'text_username.required' => 'O campo de e-mail é obrigatório',
            'text_username.email' => 'O campo de e-mail deve conter um endereço válido',

            //Mensagem para text_password
            'text_password.required' => 'A senha é obrigatória',
            'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
            'text_password.max' => 'A senha deve ter no máximo :max caracteres',

        ]
    );

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        //Testar se o usuario é válido
        $usuario = User::where('username',$username)
                        ->whereNull('deleted_at')
                        ->first();
        if(!$usuario){
            return redirect()->back()
                ->withInput() //preservar os dados
                ->with('login_error','Usuário ou senha incorretos.');
        }
        
        if(!password_verify($password, $usuario->password)){
            return redirect()->back()
                             ->withInput()
                             ->with('login_error','Usuário ou senha incorretos.');
        }

        $usuario->last_login = Date('Y-m-d H:i:s');
        $usuario->save();

        session([
            'user' => [
                'id' => $usuario->id,
                'username' => $usuario->username,
                'role' => $usuario->funcao
            ]
            ]);
        
            return view('home');

    }

    public function logout(){
        session()->forget('user');
        return redirect()->route('home');
    }


}
