<?php

namespace App\Http\Controllers;

use App\Models\CloudFile;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //Espace vendeur, vendeur connecté verra que ces articles dans "liste des articles"
    //recupere les produit en fonction du vendeur connecté par ordre decroissant grace a la fonction latest()
    public function index(){

        $articles= Product::where('vendor_id', auth('vendor')->user()->id)->latest()->with('image')->get();

            return view('dashboard.vendors.articles.index',compact('articles'));
    }

    //Créer un article (vendeur)
    public function create(){


        return view("dashboard.vendors.articles.create");
    }

    public function handleCreate(Request $request){

        $request->validate([
            'name'=>'required',
            'description' => 'required',
            'price'=>'required|integer'
        ], [
            'name.required' =>'Le nom du produit est requis',
            'description.required' =>'La description du produit est requis',
            'price.required' => 'Le prix du produit est requis'
        ]);

        try {
            //code...
            DB::beginTransaction();
            $productData= [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'vendor_id' => auth('vendor')->user()->id,
            ];

             $product= Product::create($productData);

             //Gérer ici l'upload des images
             $this->handleImageUpload($product,$request,'image','clous_files/articles','cloud_file_id');


             DB::commit();

             return redirect()->route('articles.index')->with('success','Produit enregistrer avec succès');


        } catch (Exception $e) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    //Enregistrement de l'image lors de la creation de l'article
    public function handleImageUpload($data,$request,$inputKey,$destination,$attributeName){


        if($request->hasFile($inputKey)){

            //chemin vers le fichier
            $filePath=$request->file($inputKey)->store("$destination", 'public');

            $cloudFile = CloudFile::create([
                'path' => $filePath
            ]);

            $data->{$attributeName} = $cloudFile->id;

            $data->update();
        }

    }
 }
