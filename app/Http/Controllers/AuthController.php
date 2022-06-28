<?php

namespace App\Http\Controllers;
use Session;

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
    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $user = User::where("email", $request->email)->first();
        if($user){
            if(password_verify($request->password, $user->password)){
                $request->session()->put("userId", $user->id);
                return redirect("/");
            }
        }
        return back()->withInput(array('msg' => "E-mail ou senha inválidos"));
    }
    public function allUsers(Request $request){
        if($request->Session()->has("userId")){
            $users = User::all();
            $curUserName = User::find($request->Session()->get("userId"))->name;
            return view("data.allUsers", ["users"=>$users, "curUserName"=>$curUserName]);
        }
        return redirect("/login");
    }
    public function logOut(Request $request){
        if($request->Session()->has("userId")){
            $request->Session()->forget("userId");
        }
        return redirect("/login");
    }
    public function delete(Request $request){
        if($request->Session()->has("userId")){
            return "Usuario sendo deletado " . $request->Session()->get("userId");
        }
        return redirect("/login");
    }
    public function edit(Request $request)
    {
        if($request->Session()->has("userId")){
        $user = User::where("id", $request->Session()->get("userId"))->first();
            return view("data.updateUser", ["user"=>$user]);
        }
        return redirect("/login");
    }

    public function editUser(Request $request){
        $curId = $request->Session()->get("userId");
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $curId,
            'phone' => "required",
            'status' => "required|in:Empregado,Desempregado"
        ]);
        $user = User::where("id", $curId)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->save();

        return redirect("/")->withInput(array('msg' => "Usuário atualizado com sucesso!"));
        
    }
}
