@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('typeevenement.index')}}">listes prédéfinies</a></li>
        <li class="active">Modifier un type d'évenement</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Type d'évenements - Modification</strong><small> </small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('evenements.update',$typeevenement_enr->id)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Code évenement</span>
        </div>
        <input type="text"  name="id" value="{{$typeevenement_enr->id}}" id="id" class="form-control {{$errors->has('id')? 'is-invalid' :''}}" placeholder="id" aria-label="id" aria-describedby="basic-addon1" readonly>
            @error('id')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Libelle</span>
        </div>
        <input type="text"  name="libelle" value="{{$typeevenement_enr->libelle}}" id="libelle" class="form-control {{$errors->has('libelle')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="libelle" aria-describedby="basic-addon1">
            @error('libelle')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
    <div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
            <i class="fa fa-save fa-lg "></i>
            <span id="payment-button-amount">Enregistrer</span>                            
        </button>
    </div>
</form>
<br><br>

   {{-- <form  action="{{route('evenement.edit',$typeevenement_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('listes_predefinies.liste_des_evenements.tblaffichage_liste_des_evenement') 

           </div>
           
        </div>
    </div>
</div>  




@endsection