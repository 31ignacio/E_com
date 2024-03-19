<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    public function index(){

        $articles= Product::all();

            return view('dashboard.vendors.articles.index',compact('articles'));
    }

    public function create(){


        return view("dashboard.vendors.articles.create");
    }
}
