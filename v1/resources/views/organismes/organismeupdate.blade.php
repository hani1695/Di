@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('organisme.index')}}">organismes</a></li>
        <li class="active">Modifier un organisme</li>
    </ol>
@endsection

@section('content')

<div class="gptitresection"> 
   <h1> Liste des organismes - Modification </h1> 
</div>

<div>  
   @foreach ($organisme_enr as $organisme_enrs)

<form method="POST" action="{{route('organisme.update',$organisme_enrs)}}" class="container">
   @csrf
   @method('PUT')

   <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Id</span>
        </div>
        <input type="text"  name="id" value="{{$organisme_enrs->id}}" id="id" class="form-control {{$errors->has('id')? 'is-invalid' :''}}" placeholder="id" aria-label="id" aria-describedby="basic-addon1" readonly>
            @error('id')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Matricule</span>
        </div>
        <input type="text"  name="matricule" value="{{$organisme_enrs->matricule}}" id="matricule" class="form-control {{$errors->has('matricule')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="matricule" aria-describedby="basic-addon1">
            @error('matricule')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Nom</span>
        </div>
        <input type="text"  name="nom" value="{{$organisme_enrs->nom}}" id="nom" class="form-control {{$errors->has('nom')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="nom" aria-describedby="basic-addon1">
            @error('nom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Prénom</span>
        </div>
        <input type="text"  name="prenom" value="{{$organisme_enrs->prenom}}" id="prenom" class="form-control {{$errors->has('prenom')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="prenom" aria-describedby="basic-addon1">
            @error('prenom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Direction</span>
        </div>
        <input type="text"  name="nomdrread" value="{{$organisme_enrs->nom_dr}}" id="nomdrread" class="form-control {{$errors->has('nomdrread')? 'is-invalid' :''}}" placeholder="exemple: direction" aria-label="nomdrread" aria-describedby="basic-addon1" readonly>
            @error('nomdrread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Structure</span>
        </div>
        <input type="text"  name="structureread" value="{{$organisme_enrs->structure}}" id="structureread" class="form-control {{$errors->has('structureread')? 'is-invalid' :''}}" placeholder="exemple: agence x" aria-label="structureread" aria-describedby="basic-addon1" readonly>
            @error('structureread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    <livewire:listebagence>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Fonction</span>
        </div>
        <input type="text"  name="fonction" value="{{$organisme_enrs->fonction}}" id="fonction" class="form-control {{$errors->has('fonction')? 'is-invalid' :''}}" placeholder="exemple: directeur" aria-label="fonction" aria-describedby="basic-addon1">
            @error('fonction')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">E-Mail</span>
        </div>
        <input type="text"  name="email" value="{{$organisme_enrs->email}}" id="email" class="form-control {{$errors->has('email')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="email" aria-describedby="basic-addon1">
            @error('email')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <!-- <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Mot de passe</span>
        </div>
        <input type="text"  name="password" value="{{$organisme_enrs->password}}" id="password" class="form-control {{$errors->has('password')? 'is-invalid' :''}}" placeholder="exemple: 123456789" aria-label="password" aria-describedby="basic-addon1" readonly> 
            @error('password')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> -->

   <livewire:listeprofile>            

   <button type="submit" class="btn btn-info boutonajout" > Enregistrer la modification</button>

</form>
   @endforeach   
   <form  action="{{route('organisme.edit',,$organisme_enrs)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>       
</div>

@include('organismes.tblaffichageorg') 

@endsection