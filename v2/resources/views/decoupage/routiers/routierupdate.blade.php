@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('routier.index')}}">Adressages</a></li>
        <li class="active">Modifier un routier</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des routiers - Modification</strong><small></small></div>
            @include('admin.messages')

            <div class="card-body card-block">
                 

<form method="POST" action="{{route('routier.update',$routier_enr->id_tr)}}" >
   @csrf
   @method('PUT')

{{-- <div class="form-row">
   <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code</span>
        </div>
        <input type="text"  name="id_tr" value="{{$routier_enr->id_tr}}" id="id_tr" class="form-control {{$errors->has('id_tr')? 'is-invalid' :''}}" placeholder="id_tr" aria-label="id_tr" aria-describedby="basic-addon1" readonly>
            @error('id_tr')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">numero route</span><span class="text-danger">*</span>
        </div>
        <input type="text"  name="num_route" value="{{$routier_enr->num_route}}" id="num_route" class="form-control {{$errors->has('num_route')? 'is-invalid' :''}}"  aria-label="num_route" aria-describedby="basic-addon1">
            @error('num_route')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
{{-- </div> --}}
<div class="form-row">

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">classification</span>
        </div>
        <input type="text"  name="classification" value="{{$routier_enr->classification}}" id="classification" class="form-control {{$errors->has('classification')? 'is-invalid' :''}}"  aria-label="classification" aria-describedby="basic-addon1">
            @error('classification')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">NB voie</span>
        </div>
        <input type="text"  name="nb_voie" value="{{$routier_enr->nb_voie}}" id="nb_voie" class="form-control {{$errors->has('nb_voie')? 'is-invalid' :''}}" aria-label="nb_voie" aria-describedby="basic-addon1">
            @error('nb_voie')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>
<div class="form-row">

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">sens</span>
        </div>
        <input type="text"  name="sens" value="{{$routier_enr->sens}}" id="sens" class="form-control {{$errors->has('sens')? 'is-invalid' :''}}"  aria-label="sens" aria-describedby="basic-addon1">
            @error('sens')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{-- <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Direction</span>
        </div>
        <input type="text"  name="nomdrread" value="{{$routier_enr->nom_dr}}" id="nomdrread" class="form-control {{$errors->has('nomdrread')? 'is-invalid' :''}}" placeholder="exemple: direction" aria-label="nomdrread" aria-describedby="basic-addon1" readonly>
            @error('nomdrread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>--}}

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">carossable</span>
        </div>
        <input type="text"  name="carossable" value="{{$routier_enr->carossable}}" id="carossable" class="form-control {{$errors->has('carossable')? 'is-invalid' :''}}"  aria-label="carossable" aria-describedby="basic-addon1" >
            @error('carossable')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    {{-- <livewire:listebagence> --}}
 </div>
 <div class="form-row">

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">debut droite</span>
        </div>
        <input type="text"  name="debut_droite" value="{{$routier_enr->debut_droite}}" id="debut_droite" class="form-control {{$errors->has('debut_droite')? 'is-invalid' :''}}"  aria-label="debut_droite" aria-describedby="basic-addon1">
            @error('debut_droite')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">debut gauche</span>
        </div>
        <input type="text"  name="debut_gauche" value="{{$routier_enr->debut_gauche}}" id="debut_gauche" class="form-control {{$errors->has('debut_gauche')? 'is-invalid' :''}}"  aria-label="debut_gauche" aria-describedby="basic-addon1">
            @error('debut_gauche')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
 </div>
 <div class="form-row">

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">fin droite</span>
        </div>
        <input type="text"  name="fin_droite" value="{{$routier_enr->fin_droite}}" id="fin_droite" class="form-control {{$errors->has('fin_droite')? 'is-invalid' :''}}"  aria-label="fin_droite" aria-describedby="basic-addon1">
            @error('fin_droite')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">fin gauche</span>
        </div>
        <input type="text"  name="fin_gauche" value="{{$routier_enr->fin_gauche}}" id="fin_gauche" class="form-control {{$errors->has('fin_gauche')? 'is-invalid' :''}}"  aria-label="fin_gauche" aria-describedby="basic-addon1">
            @error('fin_gauche')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
 </div>
 <div class="form-row">

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code com droite</span>
        </div>
        <input type="text"  name="code_com_dte" value="{{$routier_enr->code_com_dte}}" id="code_com_dte" class="form-control {{$errors->has('code_com_dte')? 'is-invalid' :''}}"  aria-label="code_com_dte" aria-describedby="basic-addon1">
            @error('code_com_dte')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code com gauche</span>
        </div>
        <input type="text"  name="code_com_ghe" value="{{$routier_enr->code_com_ghe}}" id="code_com_ghe" class="form-control {{$errors->has('code_com_ghe')? 'is-invalid' :''}}"  aria-label="code_com_ghe" aria-describedby="basic-addon1">
            @error('code_com_ghe')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
 </div>
 <div class="form-row">

    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">etat route</span><span class="text-danger">*</span>
        </div>
        <input type="text"  name="etat_route" value="{{$routier_enr->etat_route}}" id="etat_route" class="form-control {{$errors->has('etat_route')? 'is-invalid' :''}}"  aria-label="etat_route" aria-describedby="basic-addon1">
            @error('etat_route')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">observation</span>
        </div>
        <input type="text"  name="observation" value="{{$routier_enr->observation}}" id="observation" class="form-control {{$errors->has('observation')? 'is-invalid' :''}}"  aria-label="observation" aria-describedby="basic-addon1">
            @error('observation')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>

    {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">geom</span>
        </div>
        <input type="text"  name="geom" value="{{$routier_enr->geom}}" id="geom" class="form-control {{$errors->has('geom')? 'is-invalid' :''}}"  aria-label="geom" aria-describedby="basic-addon1">
            @error('geom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    {{-- <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">commune</span>
        </div>
        <select class="form-control @error('fk_commune') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_commune">
            <option value="" selected disabled>Séléctionner commune</option>
            @foreach ($communes as $commune)
            <option value="{{ $commune->code_c }}"> {{ $commune->nom_c }}</option>
          @endforeach
        </select>     
        @error('fk_commune')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror   
    </div> --}}
    {{-- <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">wilaya</span>
        </div>
        <select class="form-control @error('fk_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_wilaya">
            <option value="" selected disabled>Séléctionner wilaya</option>
            @foreach ($wilayas as $wilaya)
            <option value="{{ $wilaya->code_w }}"> {{ $wilaya->nom_w }}</option>
          @endforeach
        </select>     
        @error('fk_wilaya')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror   
    </div> --}}
    <livewire:wilaya-commune :wilaya="$routier_enr->fk_wilaya" :commune="$routier_enr->fk_commune"> 

    {{-- <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">fk_wilaya</span>
        </div>
        <input type="text"  name="fk_wilaya" value="{{$routier_enr->fk_wilaya}}" id="fk_wilaya" class="form-control {{$errors->has('fk_wilaya')? 'is-invalid' :''}}"  aria-label="fk_wilaya" aria-describedby="basic-addon1">
            @error('fk_wilaya')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">fk_diara</span>
        </div>
        <input type="text"  name="fk_diara" value="{{$routier_enr->fk_diara}}" id="fk_diara" class="form-control {{$errors->has('fk_diara')? 'is-invalid' :''}}"  aria-label="fk_diara" aria-describedby="basic-addon1">
            @error('fk_diara')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}
    

    {{--<!-- <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Mot de passe</span>
        </div>
        <input type="text"  name="password" value="{{$routier_enr->password}}" id="password" class="form-control {{$errors->has('password')? 'is-invalid' :''}}" placeholder="exemple: 123456789" aria-label="password" aria-describedby="basic-addon1" readonly> 
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


{{-- {{route('routier.edit',$routier_enr)}} --}}
 {{--   <form  action="" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    

    @include('decoupage.routiers.tblaffichageroutier') 
           </div>
           <br>
        <br>
        </div>
    </div>
</div>





@endsection