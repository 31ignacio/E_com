@extends('layouts.vendor-dashboard-layout')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Mes articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ajouter un article</li>
    </ol>

    <div class="card my-4">
        <div class="card-header">Formulaire d'ajout</div>
        <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data">
            
                <div class="form-group mb-4">
                    <label for="">Image du produit</label>
                    <input type="file" name="image" class="form-control" accept=".png, .jpg" id="image">
                </div>

                <div class="form-group mb-4">
                    <label for="">Libelle</label>
                    <input type="text" name="name" class="form-control"  placeholder="Iphone 14">
                </div>

                <div class="form-group mb-4">
                    <label for="">Prix</label>
                    <input type="number" name="name" class="form-control"  placeholder="300">
                </div>

                <div class="form-group mb-4">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            
            
            </form>

        </div>


    </div>

</div>




@endsection