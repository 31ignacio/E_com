<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //
    public function register(){

        return view('auth.users.register');
    }

    public function handleUserRegister(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:4'
        ], [
            'name.required'=>'Votre nom est requis',
            'email.required'=>'Votre email est requis',
            'email.unique'=>'Cette adresse mail est déjà prise', 
            'password.required'=>'Le mot de passe est requis',
            'password.min'=> 'Le mot de passe doit avoir au moins 4 caractères'
        ]);


        try {
            //code...
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
            ]);
            return redirect()->back()->with('success','Votre compte a été crée. Connecter vous');
        } catch (Exception $e) {
            //throw $th;
        }
    }  
    
    public function login(){

        return view('auth.users.login');
    }
}
