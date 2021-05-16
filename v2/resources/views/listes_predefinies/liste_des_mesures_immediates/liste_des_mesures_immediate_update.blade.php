@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('mesure.index')}}">listes prédéfinies</a></li>
        <li class="active">Modifier la mesure</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Mesures - Modification</strong><small> </small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('mesure.update',$mesure_enr->id_mesure)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Code </span>
        </div>
        <input type="text"  name="id_mesure" value="{{$mesure_enr->id_mesure}}" id="id_mesure" class="form-control {{$errors->has('id_mesure')? 'is-invalid' :''}}" placeholder="id_mesure" aria-label="id_mesure" aria-describedby="basic-addon1" readonly>
            @error('id_mesure')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Designation</span>
        </div>
        <input type="text"  name="descreption_mesure" value="{{$mesure_enr->descreption_mesure}}" id="descreption_mesure" class="form-control {{$errors->has('descreption_mesure')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="descreption_mesure" aria-describedby="basic-addon1">
            @error('descreption_mesure')
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

   {{-- <form  action="{{route('mesure.edit',$mesure_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('listes_predefinies.liste_des_mesures_immediates.tblaffichage_liste_des_mesures_immediate') 

           </div>
           
        </div>
    </div>
</div>  




@endsection