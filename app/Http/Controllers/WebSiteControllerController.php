<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebSiteControllerController extends Controller
{
    //
    public function index(){

        $articles= Product::latest()->with('image')->paginate(20);

        //dd($articles);

        return  view('welcome', compact(('articles')));
    }
}
