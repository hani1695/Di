@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('mesure.index')}}">les mesures</a></li>
        <li class="active">Modifier la mesure</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des mesures - Modification</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('mesure.update',$mesure_enr->id_mesure)}}" class="container">
   @csrf
   @method('PUT')

   <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code mesure</span>
        </div>
        <input type="text"  name="id_mesure" value="{{$mesure_enr->id_mesure}}" id="id_mesure" class="form-control {{$errors->has('id_mesure')? 'is-invalid' :''}}" placeholder="id_mesure" aria-label="id_mesure" aria-describedby="basic-addon1" readonly>
            @error('id_mesure')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">descreption</span>
        </div>
        <input type="text"  name="descreption_mesure" value="{{$mesure_enr->descreption_mesure}}" id="descreption_mesure" class="form-control {{$errors->has('descreption_mesure')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="descreption_mesure" aria-describedby="basic-addon1">
            @error('descreption_mesure')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
   <button type="submit" class="btn btn-info boutonajgout" > Enregistrer la modification</button>

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