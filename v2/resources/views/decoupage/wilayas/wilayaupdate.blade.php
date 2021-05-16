@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('wilaya.index')}}">Découpage Administratif</a></li>
        <li class="active">Modifier la wilaya</li>
    </ol>
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>    
<link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">

 <!-- FontAwesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
 <link rel="stylesheet" href="/assets/dist/ol-ext.css" />
 <script type="text/javascript" src="/assets/dist/ol-ext.js"></script>
 <!-- Pointer events polyfill for old browsers, see https://caniuse.com/#feat=pointer -->
 <script src="https://unpkg.com/elm-pep"></script>
 
 <script src="/assets/map/js/initWilaya.js"></script>
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des wilayas - Modification</strong><small> </small></div>
            @include('admin.messages')

            <div class="card-body card-block">
                 
                {{-- {{route('wilaya.update',$wilaya_enr)}} --}}
<form method="POST" action="{{route('wilaya.update',$wilaya_enr->code_w)}}" >
    @method('PUT')
   @csrf

   {{-- <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">code wilaya</span>
        </label>
        <input type="text"  name="code_w" value="{{$wilaya_enr->code_w}}" id="code_w" class="form-control {{$errors->has('code_w')? 'is-invalid' :''}}"  aria-label="code_w" aria-describedby="basic-addon1" >
            @error('code_w')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1"> Wilaya</span>
        </label>
        <input type="text"  name="nom_w" value="{{$wilaya_enr->nom_w}}" id="nom_w" class="form-control {{$errors->has('nom_w')? 'is-invalid' :''}}"  aria-label="nom_w" aria-describedby="basic-addon1">
            @error('nom_w')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
{{-- 
    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">nom_w</span>
        </label>
        <input type="text"  name="nom" value="{{$wilaya_enr->nom_w}}" id="nom" class="form-control {{$errors->has('nom')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="nom" aria-describedby="basic-addon1">
            @error('nom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1"> Wilaya en arabe</span>
        </label>
        <input type="text"  name="nom_w_arb" value="{{$wilaya_enr->nom_w_arb}}" id="nom_w_arb" class="form-control {{$errors->has('nom_w_arb')? 'is-invalid' :''}}"  aria-label="nom_w_arb" aria-describedby="basic-addon1">
            @error('nom_w_arb')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{-- <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">Direction</span>
        </label>
        <input type="text"  name="nomdrread" value="{{$wilaya_enr->nom_dr}}" id="nomdrread" class="form-control {{$errors->has('nomdrread')? 'is-invalid' :''}}" placeholder="exemple: direction" aria-label="nomdrread" aria-describedby="basic-addon1" readonly>
            @error('nomdrread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>--}}

    {{-- <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">geom wilaya</span>
        </label>
        <input type="text"  name="geom_w" value="{{$wilaya_enr->geom_w}}" id="geom_w" class="form-control {{$errors->has('geom_w')? 'is-invalid' :''}}"  aria-label="geom_w" aria-describedby="basic-addon1" readonly>
            @error('geom_w')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}


    {{-- <livewire:listebagence> --}}

    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">Autre nom wilaya</span>
        </label>
        <input type="text"  name="autre_nom_w" value="{{$wilaya_enr->autre_nom_w}}" id="autre_nom_w" class="form-control {{$errors->has('autre_nom_w')? 'is-invalid' :''}}" aria-label="autre_nom_w" aria-describedby="basic-addon1">
            @error('autre_nom_w')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">Sièsge </span>
        </label>
        <input type="text"  name="siege_w" value="{{$wilaya_enr->siege_w}}" id="siege_w" class="form-control {{$errors->has('siege_w')? 'is-invalid' :''}}"  aria-label="siege_w" aria-describedby="basic-addon1">
            @error('siege_w')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{--<!-- <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">Mot de passe</span>
        </label>
        <input type="text"  name="password" value="{{$wilaya_enr->password}}" id="password" class="form-control {{$errors->has('password')? 'is-invalid' :''}}" placeholder="exemple: 123456789" aria-label="password" aria-describedby="basic-addon1" readonly> 
            @error('password')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> -->--}}


    {{-- <livewire:listeprofile>             --}}

        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                <i class="fa fa-save fa-lg "></i>
                <span id="payment-button-amount">Enregistrer</span>                            
            </button>
        </div>

</form>
<br>
<br>
   {{-- <form  action="{{route('wilaya.edit',$wilaya_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('decoupage.wilayas.tblaffichagewilaya') 

           </div>
           	   <div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        
<div id="map"></div>
</div>
</div>

<div class="row">
  <div class="col-md-12">
    
    <div id="info">No countries selected</div>
    <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>
</div>
</div>
</div> 
        </div>
    </div>
</div>  




@endsection