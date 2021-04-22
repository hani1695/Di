@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('utilisateur.index')}}">Utilisateurs</a></li>
        <li class="active">Créer un utilisateur</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des utilisateurs -ajout</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                
<form method="POST" action="{{route('utilisateur.store')}}" class="container">
   @csrf

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Matricule</span>
        </div>
        <input type="text"  name="matricule" value="{{old('matricule')}}" id="matricule" class="form-control {{$errors->has('matricule')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="matricule" aria-describedby="basic-addon1">
            @error('matricule')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Nom</span>
        </div>
        <input type="text"  name="nom" value="{{old('nom')}}" id="nom" class="form-control {{$errors->has('nom')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="nom" aria-describedby="basic-addon1">
            @error('nom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Prénom</span>
        </div>
        <input type="text"  name="prenom" value="{{old('prenom')}}" id="prenom" class="form-control {{$errors->has('prenom')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="prenom" aria-describedby="basic-addon1">
            @error('prenom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <livewire:listebagence>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Fonction</span>
        </div>
        <input type="text"  name="fonction" value="{{old('fonction')}}" id="fonction" class="form-control {{$errors->has('fonction')? 'is-invalid' :''}}" placeholder="exemple: directeur" aria-label="fonction" aria-describedby="basic-addon1">
            @error('fonction')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">E-Mail</span>
        </div>
        <input type="text"  name="email" value="{{old('email')}}" id="email" class="form-control {{$errors->has('email')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="email" aria-describedby="basic-addon1">
            @error('email')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Mot de passe</span>
        </div>
        <input type="text"  name="password" value="{{old('email')}}" id="password" class="form-control {{$errors->has('password')? 'is-invalid' :''}}" placeholder="exemple: 123456789" aria-label="password" aria-describedby="basic-addon1">
            @error('password')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <livewire:listeprofile>     

   <button type="submit" class="btn btn-info boutonajout" > Enregistrer le nouvel utilisateur</button>
   </form>

   <form  action="{{route('utilisateur.create')}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>
    </form>      

 
@include('utilisateurs.tblaffichageuser')                
                
            </div>
           
        </div>
    </div>
</div>  



@endsection