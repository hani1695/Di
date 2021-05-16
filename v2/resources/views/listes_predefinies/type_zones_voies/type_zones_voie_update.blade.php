@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('typezonevoie.index')}}">listes prédéfinies</a></li>
        <li class="active">Zone & voie</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Zone & voie - Modification</strong><small> </small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('typezonevoie.update',$zone_enr->id_type_z_v)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Code </span>
        </div>
        <input type="text"  name="id_type_z_v" value="{{$zone_enr->id_type_z_v}}" id="id_type_z_v" class="form-control {{$errors->has('id_type_z_v')? 'is-invalid' :''}}" placeholder="id_type_z_v" aria-label="id_type_z_v" aria-describedby="basic-addon1" readonly>
            @error('id_type_z_v')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group">
        <label for="exampleFormControlSelect1">Adresse<span class="text-danger">*</span></label>
        <select class="form-control @error('fk_adresse') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_adresse">
            <option value="" selected disabled>Séléctionner un type d'adresse</option>
            @foreach ($adresses as $adresse)
            <option value="{{ $adresse->id_type_adr }}"> {{ $adresse->descreption_t_adr }}</option>
          @endforeach
        </select>     
        @error('fk_adresse')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror
        
    </div> 

    <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Designation</span>
        </div>
        <input type="text"  name="descreption_z_v" value="{{$zone_enr->descreption_z_v}}" id="descreption_z_v" class="form-control {{$errors->has('descreption_z_v')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="descreption_z_v" aria-describedby="basic-addon1">
            @error('descreption_z_v')
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

   {{-- <form  action="{{route('typezonevoie.edit',$zone_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('listes_predefinies.type_zones_voies.tblaffichage_type_zones_voie') 

           </div>
           
        </div>
    </div>
</div>  




@endsection