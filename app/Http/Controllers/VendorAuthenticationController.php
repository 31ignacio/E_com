<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;

class VendorAuthenticationController extends Controller
{
    //

    public function login(){


        return view('auth.vendors.login');
    }

    public function handleLogin(Request $request){

        $request->validate([
            'email'=>'required|exists:vendors,email',
            'password'=>'required|min:4'
        ], [
            'email.required'=>'Votre email est requis',
            'email.exists'=>'Cette adresse mail n\'est pas reconnu', 
            'password.required'=>'Le mot de passe est requis',
            'password.min'=> 'Le mot de passe doit avoir au moins 4 caractères'
        ]);

        // try {
        //     //code...
        //     if(auth()->attempt($request->only('email','password'))){
        //         //Rediriger vers la page d'accueil

        //         return redirect('/');
        //     }else{
        //         return redirect()->back()->with('error','Information de connexion non reconnu');
        //     }

        // } catch (Exception $e) {
        //     //throw $th;
        // }

    }


    public function register(){


        return view('auth.vendors.register');
    }

    public function handleRegister(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:vendors,email',
            'password'=>'required|min:4'
        ], [
            'name.required'=>'Votre nom de vendeur est requis',
            'email.required'=>'Votre email est requis',
            'email.unique'=>'Cette adresse mail est déjà prise', 
            'password.required'=>'Le mot de passe est requis',
            'password.min'=> 'Le mot de passe doit avoir au moins 4 caractères'
        ]);


        try {
            //code...
            Vendor::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
            ]);
            return redirect()->back()->with('success','Votre compte vendeur a été crée. Connecter vous');
        } catch (Exception $e) {
            //throw $th;
            dd($e);
        }
    }  
    
}
