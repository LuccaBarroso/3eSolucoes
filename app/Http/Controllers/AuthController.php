<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function register(){
        return view("auth.register");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => "required",
            'status' => "required|in:Empregado,Desempregado",
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->password = bcrypt($request->password);
        $res = $user->save();
        if($res){
            return view("auth.login", ["msg"=>"Usuário cadastrado com sucesso!"]);
        }else{
            return back()->withInput(array('msg' => "Erro ao cadastrar usuário"));
        }
        
    }
}
