@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Sécurité</a></li>
        <li class="active">Liste profiles</li>
    </ol>
@endsection


@section('content')
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Créer un profil</strong><small> Formulaire</small></div>




            @include('admin.messages')
            <div class="card-header">
              @if ( $privilege->insertion)
              <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                  Ajouter un profil
              </a>
              <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                      <form action="{{ route('securitestore') }}" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="code" class=" form-control-label">Code <span class="text-danger">*</span></label>
                              <input type="text" id="code" placeholder="code" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"autofocus>
                              @error('code')
                                  <span class="invalid-feedback" role="alert">
                                      {{ $message }}
                                  </span>                                
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="libelle" class=" form-control-label">Libellé <span class="text-danger">*</span></label>
                              <input type="text" id="libelle" placeholder="libelle" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}"autofocus>
                              @error('libelle')
                                  <span class="invalid-feedback" role="alert">
                                      {{ $message }}
                                  </span>                                
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="description" class=" form-control-label">Description <span class="text-danger">*</span></label>
                              <input type="text" id="description" placeholder="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"autofocus>
                              @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      {{ $message }}
                                  </span>                                
                              @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Visibilité <span class="text-danger">*</span></label>
                            <select class="form-control {{$errors->has('limitation')? 'is-invalid' :''}}" value="" id="listenomdr" name="limitation">
                              <option value="">Selectionner l'étendu de la visibilité </option>
                             @if($privilege->visibilite=='N') <option value="N"  > Visibilité échelle Nationale</option> @endif
                             @if($privilege->visibilite=='N' or $privilege->visibilite=='R' ) <option value="R"  > Visibilité échelle Régionale</option>@endif
                             @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' ) <option value="W"  > Visibilité échelle Wilaya</option>@endif
                             @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D')  <option value="D"  > Visibilité échelle Daira</option>@endif           
                             @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D' or $privilege->visibilite=='L')  <option value="L"  > Visibilité échelle Locale/Commune</option>@endif
                             @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D' or $privilege->visibilite=='L' or $privilege->visibilite=='P') <option value="P" > Visibilité échelle Individuelle</option>@endif
                  
                          </select>     
                            @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                                                 
                        </div>
                          
                          
                          @csrf                    
                          <div>
                              <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                                  <i class="fa fa-save fa-lg "></i>
                                  <span id="payment-button-amount">Enregistrer</span>                            
                              </button>
                          </div>
                      </form>
                 </div>
                </div>
              @endif
          </div>









            <div class="card-body card-block">

{{-- @if ( $privilege->insertion)
   <form action="{{route('securitecreate')}}" class="container">
        <button type="submit" class="btn btn-info" > Ajout un profil</button>
    </form>
    @endif
    <form action="{{route('securite')}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>
    </form>   --}}

    
    {{-- @if ($message = Session::get('success'))
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
                        @endif        --}}
                              
@include('securites.tblaffichagesecurite') 
      
</div>
               
</div>
</div>
</div>
@endsection