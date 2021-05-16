@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">utilisateurs et affectation</a></li>
        <li class="active">utiisateurs mobilisés</li>
    </ol>
@endsection
@section('content')
@if ( Session::has('event_id'))
 
    <div class="row" style="margin-bottom: 100px;">
    
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Créer un utilisateur mobilise</strong><small> Formulaire</small></div>
                @include('admin.messages')
                <div class="card-header">
                @if ( $privilege->insertion )
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un utilisateur mobilisé
                </a>
                <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                <div class="card-body card-block">
                    <form method="POST" action="{{route('utilisateur_mobilise.store')}}">
               
                        {{-- <div class="form-group">
                            <label for="description" class=" form-control-label">Les utilisateur mobilise par l'évènement <span class="text-danger">*</span></label><br>
                            <select class="js-example-basic-multiple " name="user[]" multiple="multiple" style="width: 100%;">
                                
                            </select>
                        </div> --}}
                        <div class="form-group">
                            {{-- <label for="description" class=" form-control-label">Les utilisateurs mobilisés pour l'évènement <span class="text-danger">*</span></label><br>
                            <select data-placeholder="  Selectionner tous les utilisateurs mobilisés pour l'évènement" multiple class="standardSelect " name="user[]" required>
                                <option value="" label="default"></option>
                                @foreach ($utilisateurs as $utilisateur)
                                    <option value="{{ $utilisateur->id }}" >{{ $utilisateur->prenom }} {{ $utilisateur->nom }} ({{ $utilisateur->matricule }})</option>
                                @endforeach
                            </select> --}}
                            {{-- @error('user')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror --}}
                        <div id="app7">
                            <user-ag eventid="{{ Session::get("event_id") }}"></user-ag>
                        </div>
                        </div>

                        @csrf
                        <button id="payment-button" type="button" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                            <i class="fa fa-save fa-lg "></i>
                            <span id="payment-button-amount">Enregistrer</span>                            
                        </button>
                        
                    </form>
                </div>
            </div>
          @endif
                  
        </div>
        <div class="card-body card-block">
        @include('utilisateur_et_affectation.utilisateur_mobilise.tblutilisateurmobilise') 
        </div>
            </div>
        </div>
    </div>  
@else
<img src="{{ asset('images/event.png') }}" alt="">
@endif
@endsection


