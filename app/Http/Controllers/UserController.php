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

    $username = $request->text_username;
    $password = Hash::make($request->password);

    User::create([
        'username' => $request->text_username,
        'password' => Hash::make($request->password),
    ]);


    return redirect('/home')->with('success', 'Usuário cadastrado com sucesso!');

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
        $user->save();
    }

    public function updateUser(UserRequest $request, User $user){
        $request->validated();

        $username = $request->text_username;
        $password = Hash::make($request->text_password);
        
        return redirect('/home')->with('success', 'Usuário editado com sucesso!');
    }

    

}
