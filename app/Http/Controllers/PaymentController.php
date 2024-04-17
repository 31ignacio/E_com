<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    //affiche le formulaire de cinePay, si le vendor connecté a ddeja une cinePay elle va s'afficher dans le inpu sinon vide
    //la condition dans value
    public function getAccountInfo(){

        //recupere le vendeur connecté
        $vendor_id= auth('vendor')->user()->id;

        //Verifie s'il a deja entrés les info de cinepay
        $paymentInfo=PaymentGateway::where('vendor_id', $vendor_id)->first();
        
        //dd($existingAccount);


        return view('dashboard.vendors.manage.payment',compact("paymentInfo"));

    }

    //enregistrer la configuration cinepay dans la BD

    public function handleUpdateInfo(Request $request){

       // DB::beginTransaction();

        $request->validate(
            [
                'site_id' =>'required',
                'api_key'=>'required',
                'secret_key'=>'required',
            ],
            [
                'site_id.required'=>'L\'id du site est requis',
                'api_key.required'=>'La clé API est requise',
                'secret_key.required'=>'La clé secrète est requise',
            ]
        );
        //dd($payment);
        
        try {
            
            //recupere le vendeur connecté
            $vendor_id= auth('vendor')->user()->id;
            //dd($vendor_id);

            //Verifie s'il a deja entrés les info de cinepay
            $existingAccount= PaymentGateway::where('vendor_id', $vendor_id)->get();
            
            //si  oui faire une mise a jour sinon tu peux enregistrer

            if($existingAccount){
                //dd(1);

                $existingAccount->site_id = $request->site_id;
                $existingAccount->api_key = $request->api_key;
                $existingAccount->secret_key = $request->secret_key;
                
                $existingAccount->update();


            }else{
                //dd(2);
                PaymentGateway::create([
                    'vendor_id'=> $vendor_id,
                    'site_id'=>$request->site_id,
                    'api_key'=>$request->api_key,
                    'secret_key'=>$request->secret_key,
                ]);

            }
            //DB::commit();
//dd(3);
            return redirect()->back()->with('success','Donnée enregistrée');

        } catch (Exception $e) {
            //throw $th;
            dd($e);

            //DB::rollback();
        }
    }
}
