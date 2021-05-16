@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('ilot.index')}}">Adressages</a></li>
        <li class="active">Modifier un ilot</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des ilots - Modification</strong><small> </small></div>
            @include('admin.messages')

            <div class="card-body card-block">
                 

<form method="POST" action="{{route('ilot.update',$ilot_enr->id_ilot_)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code ilot</span>
        </div>
        <input type="text"  name="id_ilot_" value="{{$ilot_enr->id_ilot_}}" id="id_ilot_" class="form-control {{$errors->has('id_ilot_')? 'is-invalid' :''}}" placeholder="id_ilot_" aria-label="id_ilot_" aria-describedby="basic-addon1" readonly>
            @error('id_ilot_')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1"> Ilot</span><span class="text-danger">*</span>
        </div>
        <input type="text"  name="nom_ilot" value="{{$ilot_enr->nom_ilot}}" id="nom_ilot" class="form-control {{$errors->has('nom_ilot')? 'is-invalid' :''}}"  aria-label="nom_ilot" aria-describedby="basic-addon1">
            @error('nom_ilot')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Numero ilot</span><span class="text-danger">*</span>
        </div>
        <input type="text"  name="num_ilot" value="{{$ilot_enr->num_ilot}}" id="num_ilot" class="form-control {{$errors->has('num_ilot')? 'is-invalid' :''}}"  aria-label="num_ilot" aria-describedby="basic-addon1">
            @error('num_ilot')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Direction</span>
        </div>
        <input type="text"  name="nomdrread" value="{{$ilot_enr->nom_dr}}" id="nomdrread" class="form-control {{$errors->has('nomdrread')? 'is-invalid' :''}}" placeholder="exemple: direction" aria-label="nomdrread" aria-describedby="basic-addon1" readonly>
            @error('nomdrread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>--}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Ilot en arabe</span>
        </div>
        <input type="text"  name="nom_arb" value="{{$ilot_enr->nom_arb}}" id="nom_arb" class="form-control {{$errors->has('nom_arb')? 'is-invalid' :''}}"  aria-label="nom_arb" aria-describedby="basic-addon1" >
            @error('nom_arb')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    {{-- <livewire:listebagence> --}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Observation</span>
        </div>
        <input type="text"  name="observation" value="{{$ilot_enr->observation}}" id="observation" class="form-control {{$errors->has('observation')? 'is-invalid' :''}}"  aria-label="observation" aria-describedby="basic-addon1">
            @error('observation')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">geom</span>
        </div>
        <input type="text"  name="geom" value="{{$ilot_enr->geom}}" id="geom" class="form-control {{$errors->has('geom')? 'is-invalid' :''}}" placeholder="exemple: directeur" aria-label="geom" aria-describedby="basic-addon1">
            @error('geom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}
    <livewire:commune-district>


        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                <i class="fa fa-save fa-lg "></i>
                <span id="payment-button-amount">Enregistrer</span>                            
            </button>
        </div>
   

</form>
<br><br>

   {{-- <form  action="{{route('ilot.edit',$ilot_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('decoupage.ilots.tblaffichageilot') 

           </div>
           
        </div>
    </div>
</div>  




@endsection