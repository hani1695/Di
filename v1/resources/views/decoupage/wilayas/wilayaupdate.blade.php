@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('wilaya.index')}}">wilayas</a></li>
        <li class="active">Modifier la wilaya</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des wilayas - Modification</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                 
                {{-- {{route('wilaya.update',$wilaya_enr)}} --}}
<form method="POST" action="{{route('wilaya.update',$wilaya_enr->code_w)}}" class="container">
    @method('PUT')
   @csrf

   <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">code wilaya</span>
        </label>
        <input type="text"  name="code_w" value="{{$wilaya_enr->code_w}}" id="code_w" class="form-control {{$errors->has('code_w')? 'is-invalid' :''}}" placeholder="code_w" aria-label="code_w" aria-describedby="basic-addon1" readonly>
            @error('code_w')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">nom Wilaya</span>
        </label>
        <input type="text"  name="nom_w" value="{{$wilaya_enr->nom_w}}" id="nom_w" class="form-control {{$errors->has('nom_w')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="nom_w" aria-describedby="basic-addon1">
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
            <span class="form-control-label" id="basic-addon1">nom wilaya arabe</span>
        </label>
        <input type="text"  name="nom_w_arb" value="{{$wilaya_enr->nom_w_arb}}" id="nom_w_arb" class="form-control {{$errors->has('nom_w_arb')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="nom_w_arb" aria-describedby="basic-addon1">
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

    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">geom wilaya</span>
        </label>
        <input type="text"  name="geom_w" value="{{$wilaya_enr->geom_w}}" id="geom_w" class="form-control {{$errors->has('geom_w')? 'is-invalid' :''}}" placeholder="exemple: agence x" aria-label="geom_w" aria-describedby="basic-addon1" readonly>
            @error('geom_w')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    {{-- <livewire:listebagence> --}}

    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">autre nom wilaya</span>
        </label>
        <input type="text"  name="autre_nom_w" value="{{$wilaya_enr->autre_nom_w}}" id="autre_nom_w" class="form-control {{$errors->has('autre_nom_w')? 'is-invalid' :''}}" placeholder="exemple: directeur" aria-label="autre_nom_w" aria-describedby="basic-addon1">
            @error('autre_nom_w')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group ">
        <label class=" form-control-label">
            <span class="form-control-label" id="basic-addon1">siege wilaya</span>
        </label>
        <input type="text"  name="siege_w" value="{{$wilaya_enr->siege_w}}" id="siege_w" class="form-control {{$errors->has('siege_w')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="siege_w" aria-describedby="basic-addon1">
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

   <button type="submit" class="btn btn-info boutonajgout" > Enregistrer la modification</button>

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
           
        </div>
    </div>
</div>  




@endsection