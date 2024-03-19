<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class vendorDahboard extends Controller
{
    //

    public function index(){


        return view('dashboard.vendors.home');
    }

    public function logout(){
        Auth::guard('vendor')->logout();
        return redirect()->route('vendors.login');
    }
}
