<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function loginSubmit(Request $request){

        $username = $request->text_username;
        $password = $request->text_password;

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
        
            return redirect()->route('home');

    }

    public function logout(){
        session()->forget('user');
        return redirect()->route('home');
    }


}
