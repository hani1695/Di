@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('daira.index')}}">Découpage Administratif</a></li>
        <li class="active">Modifier un daira</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des dairas - Modification</strong><small> </small></div>
            @include('admin.messages')

            <div class="card-body card-block">
                 

<form method="POST" action="{{route('daira.update',$daira_enr->code_d)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Code daira</span>
        </div>
        <input type="text"  name="code_d" value="{{$daira_enr->code_d}}" id="code_d" class="form-control {{$errors->has('code_d')? 'is-invalid' :''}}" placeholder="code_d" aria-label="code_d" aria-describedby="basic-addon1" >
            @error('code_d')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Daira </span>
        </div>
        <input type="text"  name="nom_d" value="{{$daira_enr->nom_d}}" id="nom_d" class="form-control {{$errors->has('nom_d')? 'is-invalid' :''}}"  aria-label="nom_d" aria-describedby="basic-addon1">
            @error('nom_d')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Siège </span>
        </div>
        <input type="text"  name="siege_d" value="{{$daira_enr->siege_d}}" id="siege_d" class="form-control {{$errors->has('siege_d')? 'is-invalid' :''}}"  aria-label="siege_d" aria-describedby="basic-addon1">
            @error('siege_d')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Direction</span>
        </div>
        <input type="text"  name="nomdrread" value="{{$daira_enr->nom_dr}}" id="nomdrread" class="form-control {{$errors->has('nomdrread')? 'is-invalid' :''}}" placeholder="exemple: direction" aria-label="nomdrread" aria-describedby="basic-addon1" readonly>
            @error('nomdrread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>--}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Autre nom daira</span>
        </div>
        <input type="text"  name="autre_nom_d" value="{{$daira_enr->autre_nom_d}}" id="autre_nom_d" class="form-control {{$errors->has('autre_nom_d')? 'is-invalid' :''}}"  aria-label="autre_nom_d" aria-describedby="basic-addon1" >
            @error('autre_nom_d')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    {{-- <livewire:listebagence> --}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Source des données</span>
        </div>
        <input type="text"  name="source_donnees" value="{{$daira_enr->source_donnees}}" id="source_donnees" class="form-control {{$errors->has('source_donnees')? 'is-invalid' :''}}"  aria-label="source_donnees" aria-describedby="basic-addon1">
            @error('source_donnees')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">geom </span>
        </div>
        <input type="text"  name="geom_d" value="{{$daira_enr->geom_d}}" id="geom_d" class="form-control {{$errors->has('geom_d')? 'is-invalid' :''}}" placeholder="exemple: " aria-label="geom_d" aria-describedby="basic-addon1">
            @error('geom_d')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}
    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Wilaya</span>
        </div>
        <select class="form-control @error('fk_code_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_code_wilaya">
            @if ($daira_enr->fk_code_wilaya)
            @foreach ($wilayas as $wilaya)
            @if ($daira_enr->fk_code_wilaya==$wilaya->code_w)
            <option selected value="{{$daira_enr->fk_code_wilaya}}"> {{ $wilaya->code_w }}-{{$wilaya->nom_w}}</option>
            @endif
            @endforeach
            @else
            <option value="" selected disabled>Séléctionner la wilaya</option>
            @endif            @foreach ($wilayas as $wilaya)
            <option value="{{ $wilaya->code_w }}">{{ $wilaya->code_w }}-{{ $wilaya->nom_w }}</option>
          @endforeach
        </select>     
        @error('fk_code_wilaya')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror  
    </div>
   

     {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Mot de passe</span>
        </div>
        <input type="text"  name="password" value="{{$daira_enr->password}}" id="password" class="form-control {{$errors->has('password')? 'is-invalid' :''}}" placeholder="exemple: 123456789" aria-label="password" aria-describedby="basic-addon1" readonly> 
            @error('password')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>  --}}


    {{-- <livewire:listeprofile>             --}}

        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                <i class="fa fa-save fa-lg "></i>
                <span id="payment-button-amount">Enregistrer</span>                            
            </button>
        </div>

</form>
<br><br>

   {{-- <form  action="{{route('daira.edit',$daira_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('decoupage.dairas.tblaffichagedaira') 

           </div>
           
        </div>
    </div>
</div>  




@endsection