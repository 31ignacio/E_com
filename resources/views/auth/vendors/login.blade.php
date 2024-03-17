@extends('layouts.includes.website-layout')

@section('content')

    <link rel="stylesheet" href="{{asset('./css/auth.css')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">MON SHOP</h2>
                <div class="text-center mb-5 text-dark">Se connecter en tant qu'utilisateurs</div>
                <div class="card my-5">

                    @if(Session::get('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif

                    <form class="card-body cardbody-color p-lg-5" method="post" action="{{route('vendors.handleLogin')}}">

                            @method('post')
                            @csrf

                        <div class="text-center">
                            <img src="{{asset('vendeur.jpg')}}"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"
                                placeholder="Email-vendor@exemple.com">

                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="{{old('password')}}">
                       
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Me connecter à ma boutique</button>
                        </div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">
                         Pas de compte ? <a href="{{route('vendors.handleRegister')}}" class="text-dark fw-bold"> Créer mon compte</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    
@endsection
