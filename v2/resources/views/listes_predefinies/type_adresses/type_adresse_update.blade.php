@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('type_adresse.index')}}">listes prédéfinies</a></li>
        <li class="active">Liste des adresses</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Modifier une adresse - Modification</strong><small></small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('type_adresse.update',$type_adresse_enr->id_type_adr)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Code </span>
        </div>
        <input type="text"  name="id_type_adr" value="{{$type_adresse_enr->id_type_adr}}" id="id_type_adr" class="form-control {{$errors->has('id_type_adr')? 'is-invalid' :''}}" placeholder="id_type_adr" aria-label="id_type_adr" aria-describedby="basic-addon1" readonly>
            @error('id_type_adr')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Designation</span>
        </div>
        <input type="text"  name="descreption_t_adr" value="{{$type_adresse_enr->descreption_t_adr}}" id="descreption_t_adr" class="form-control {{$errors->has('descreption_t_adr')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="descreption_t_adr" aria-describedby="basic-addon1">
            @error('descreption_t_adr')
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

   {{-- <form  action="{{route('type_adresse.edit',$type_adresse_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('listes_predefinies.type_adresses.tblaffichage_type_adresse') 

           </div>
           
        </div>
    </div>
</div>  




@endsection