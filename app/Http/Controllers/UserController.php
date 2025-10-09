<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function signIn(){
        return view('user.signin');
    }

    public function createUser(UserRequest $request){

    $request->validated();

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

    public function list(){
        $users = User::orderByDesc('created_at')->get();
        return view('user.listUsers', ['users' => $users]);
    }

    public function find(User $user){
        return view('user.findUser', ['user' => $user]);
    }

    public function update(User $user){
        return view('user.updateUser', ['user' => $user]);
    }

    public function updateUser(UserRequest $request, User $user){
        $request->validated();

        $username = $request->text_username;
        $password = Hash::make($request->text_password);

        

        

        return redirect('/home')->with('sucess', 'Usuário editado com sucesso!');
    }

    

}
