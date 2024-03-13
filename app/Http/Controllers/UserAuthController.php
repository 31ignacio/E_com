<?php

namespace App\Http\Controllers;
use Exception;
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
            'password.required'=>'Le mot de passe est requis',
            'password.min'=> 'Le mot de passe doit avoir au moins 4 caractères'
        ]);


        try {
            //code...
        } catch (Exception $e) {
            //throw $th;
        }
    }   
}
