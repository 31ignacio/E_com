@extends('layouts.vendor-dashboard-layout')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Configurer mon adresse de paiement</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Configurer mon adresse de paiement</li>
    </ol>

    <div class="card my-4">
        <div class="card-header">Configuration (CINETPAY)</div>
        <div class="card-body">

            @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <form action="{{ route('payments.updateconfiguration') }}" method="post" enctype="multipart/form-data">

                @csrf
                @method('POST')
            
                
                <div class="form-group mb-4">
                    <label for="">API KEY</label>
                    <input type="text" name="api_key" class="form-control" value="{{ $paymentInfo ? $paymentInfo->api_key : '' }}">

                    @error('api_key')
                        <div class="text text-danger">{{ $message }}</div>                        
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="">SITE ID</label>
                    <input type="text" name="site_id" class="form-control" value="{{ $paymentInfo ? $paymentInfo->site_id : '' }}">

                    @error('site_id')
                        <div class="text text-danger">{{ $message }}</div>                        
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label for="">SECRET KEY</label>
                    <input type="text" name="secret_key" class="form-control" value="{{ $paymentInfo ? $paymentInfo->secret_key : '' }}">

                    @error('secret_key')
                        <div class="text text-danger">{{ $message }}</div>                        
                    @enderror
                </div>

                

                <div style="display:flex; justify-content:center; align-items:center;">
                    <button type="submit" class="btn btn-primary">{{ $paymentInfo ? 'Mettre à jour' : 'Enregistrer' }}</button>

                </div>
            
            </form>

        </div>


    </div>

</div>




@endsection