@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('commune.index')}}">communes</a></li>
        <li class="active">Modifier une commune</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des communes - Modification</strong><small></small></div>
            @include('admin.messages')
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('commune.update',$commune_enr->code_c)}}" >
   @csrf
   @method('PUT')

{{-- <div class="form-row">

   <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">code</span>
        </label>
        <input type="text"  name="code_c" value="{{$commune_enr->code_c}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" >
            @error('code_c')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group ">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Elevation</span>
        </label>
        <input type="text"  name="elevation" value="{{$commune_enr->elevation}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  aria-label="elevation" aria-describedby="basic-addon1">
            @error('elevation')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
{{-- </div> --}}

<div class="form-row">

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Commune</span>
        </label>
        <input type="text"  name="nom_c" value="{{$commune_enr->nom_c}}" id="nom_c" class="form-control {{$errors->has('nom_c')? 'is-invalid' :''}}"  aria-label="nom_c" aria-describedby="basic-addon1">
            @error('nom_c')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Commune en arabe</span>
        </label>
        <input type="text"  name="nom_c_arb" value="{{$commune_enr->nom_c_arb}}" id="nom_c_arb" class="form-control {{$errors->has('nom_c_arb')? 'is-invalid' :''}}"  aria-label="nom_c_arb" aria-describedby="basic-addon1">
            @error('nom_c_arb')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>
<div class="form-row">

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Siège</span>
        </label>
        <input type="text"  name="siege_c" value="{{$commune_enr->siege_c}}" id="siege_c" class="form-control {{$errors->has('siege_c')? 'is-invalid' :''}}"  aria-label="siege_c" aria-describedby="basic-addon1">
            @error('siege_c')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{-- <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Direction</span>
        </label>
        <input type="text"  name="nomdrread" value="{{$commune_enr->nom_dr}}" id="nomdrread" class="form-control {{$errors->has('nomdrread')? 'is-invalid' :''}}" placeholder="exemple: direction" aria-label="nomdrread" aria-describedby="basic-addon1" readonly>
            @error('nomdrread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>--}}
 
    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Autre nom commune</span>
        </label>
        <input type="text"  name="autre_nom_c" value="{{$commune_enr->autre_nom_c}}" id="autre_nom_c" class="form-control {{$errors->has('autre_nom_c')? 'is-invalid' :''}}"  aria-label="autre_nom_c" aria-describedby="basic-addon1" >
            @error('autre_nom_c')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>
<div class="form-row">


    {{-- <livewire:listebagence> --}}

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Nature</span>
        </label>
        <input type="text"  name="nature_c" value="{{$commune_enr->nature_c}}" id="nature_c" class="form-control {{$errors->has('nature_c')? 'is-invalid' :''}}"  aria-label="nature_c" aria-describedby="basic-addon1">
            @error('nature_c')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Source des données</span>
        </label>
        <input type="text"  name="source_donnees" value="{{$commune_enr->source_donnees}}" id="source_donnees" class="form-control {{$errors->has('source_donnees')? 'is-invalid' :''}}"  aria-label="source_donnees" aria-describedby="basic-addon1">
            @error('source_donnees')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>
{{-- <div class="form-row">

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">geom</span>
        </label>
        <input type="text"  name="geom_com" value="{{$commune_enr->geom_com}}" id="geom_com" class="form-control {{$errors->has('geom_com')? 'is-invalid' :''}}"  aria-label="geom_com" aria-describedby="basic-addon1">
            @error('geom_com')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}
    <div class="form-group ">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Zone sis</span>
        </label>
        <input type="text"  name="zone_sis" value="{{$commune_enr->zone_sis}}" id="zone_sis" class="form-control {{$errors->has('zone_sis')? 'is-invalid' :''}}"  aria-label="zone_sis" aria-describedby="basic-addon1">
            @error('zone_sis')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
{{-- </div> --}}
<div class="form-row">

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Distance chef</span>
        </label>
        <input type="text"  name="distance_chef" value="{{$commune_enr->distance_chef}}" id="distance_chef" class="form-control {{$errors->has('distance_chef')? 'is-invalid' :''}}"  aria-label="distance_chef" aria-describedby="basic-addon1">
            @error('distance_chef')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Population</span>
        </label>
        <input type="text"  name="population" value="{{$commune_enr->population}}" id="population" class="form-control {{$errors->has('population')? 'is-invalid' :''}}"  aria-label="population" aria-describedby="basic-addon1">
            @error('population')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>
<div class="form-row">

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Surface</span>
        </label>
        <input type="text"  name="surface" value="{{$commune_enr->surface}}" id="surface" class="form-control {{$errors->has('surface')? 'is-invalid' :''}}"  aria-label="surface" aria-describedby="basic-addon1">
            @error('surface')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Zone vent</span>
        </label>
        <input type="text"  name="zone_vent" value="{{$commune_enr->zone_vent}}" id="zone_vent" class="form-control {{$errors->has('zone_vent')? 'is-invalid' :''}}"  aria-label="zone_vent" aria-describedby="basic-addon1">
            @error('zone_vent')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>
{{-- <div class="form-row">

    <div class="form-group col-6">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">population</span>
        </label>
        <input type="text"  name="population" value="{{$commune_enr->population}}" id="population" class="form-control {{$errors->has('population')? 'is-invalid' :''}}"  aria-label="population" aria-describedby="basic-addon1">
            @error('population')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}
    <div class="form-group ">
        <label class="form-control-label">
            <span class="form-control-label" id="basic-addon1">Zone niege</span>
        </label>
        <input type="text"  name="zone_niege" value="{{$commune_enr->zone_niege}}" id="zone_niege" class="form-control {{$errors->has('zone_niege')? 'is-invalid' :''}}"  aria-label="zone_niege" aria-describedby="basic-addon1">
            @error('zone_niege')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
{{-- </div> --}}

    <livewire:wilaya-daira>

   

        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                <i class="fa fa-save fa-lg "></i>
                <span id="payment-button-amount">Enregistrer</span>                            
            </button>
        </div>
        
  
</form>



    
    
<br>
@include('decoupage.communes.tblaffichagecommune') 
           </div>
           <br>
        <br>
        </div>
    </div>
</div>





@endsection