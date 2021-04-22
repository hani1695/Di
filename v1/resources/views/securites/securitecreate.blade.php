@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="/securite">Sécurité</a></li>
        <li class="active">ajout profile</li>
    </ol>
@endsection


@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong> Liste des profiles - ajout</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                



  
<form method="post" action="/securite/store" class="container">
   @csrf

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Code</span>
        </div>
        <input type="text"  name="code" value="{{old('code')}}" id="code" class="form-control {{$errors->has('code')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="code" aria-describedby="basic-addon1">
            @error('code')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Libellé</span>
        </div>
        <input type="text"  name="libelle" value="{{old('libelle')}}" id="libelle" class="form-control {{$errors->has('libelle')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="libelle" aria-describedby="basic-addon1">
            @error('libelle')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Description</span>
        </div>
        <input type="text"  name="description" value="{{old('description')}}" id="description" class="form-control {{$errors->has('description')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="description" aria-describedby="basic-addon1">
            @error('description')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Visibilité </span>
        </div>
        <select class="form-control {{$errors->has('limitation')? 'is-invalid' :''}}" value="" id="listenomdr" name="limitation">
            <option value="">Selectionner l'étendu de la visibilité </option>
           @if($privilege->visibilite=='N') <option value="N"  > Visibilité échelle Nationale</option> @endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' ) <option value="R"  > Visibilité échelle Régionale</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' ) <option value="W"  > Visibilité échelle Wilaya</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D')  <option value="D"  > Visibilité échelle Daira</option>@endif           
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D' or $privilege->visibilite=='L')  <option value="L"  > Visibilité échelle Locale/Commune</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D' or $privilege->visibilite=='L' or $privilege->visibilite=='P') <option value="P" > Visibilité échelle Individuelle</option>@endif

        </select>        
      
       @error('limitation')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror    
    </div>

   <button type="submit" class="btn btn-info boutonajout" > Enregistrer le nouveau profile</button>
   
   </form>

   <form  action="/securite/create" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>
    </form>      

    @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
  @if ($message = Session::get('warning'))
                          <div class="alert alert-warning">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
 @if ($message = Session::get('error'))
                          <div class="alert alert-danger">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif    
                        
@include('securites.tblaffichagesecurite') 



                
                
</div>
           
           </div>
       </div>
   </div>  
   
     
@endsection