@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Évènements</a></li>
        <li class="active">Affecter les zones a l'inspecteur</li>
    </ol>
@endsection
@section('content')
@if ( Session::has('event_id'))

    <div class="row" style="margin-bottom: 100px;">
    
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Affectation zones a l'inspecteur</strong><small> Formulaire</small></div>
                <div class="card-header">
                @include('admin.messages')
                @if ( true )
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Affecter les zones a l'inspecteur
                </a>
                <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                <div class="card-body card-block">
                    <form method="POST" action="{{ route('declarationDesZones.store') }}">
                        <div class="form-group">
                            <label for="description" class=" form-control-label">Zones <span class="text-danger">*</span></label><br>
                            <select data-placeholder="  Selectionner toutes les zones de l'évènement" multiple class="standardSelect  @error('zones') is-invalid @enderror" name="zones[]" required>
                                <option value="" label="default"></option>
                                @foreach ($zonesAEva as $zoneAEva)
                                    <option value="{{ $zoneAEva->id_zone }}" >{{ $zoneAEva->nom_zone }}</option>
                                @endforeach
                            </select>
                            @error('zones')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleFormControlSelect1">Inspecteurs <span class="text-danger">*</span></label>
                            <select class="form-control" id="exampleFormControlSelect1" name="insp">
                              <option disabled selected>Sélectionner un inspecteur</option>     
                              @foreach ($utilisateursMob as $utilisateurMob)
                                  <option value="{{ $utilisateurMob->id_user_event }}">{{ $utilisateurMob->nom.' '.$utilisateurMob->prenom.' ('.$utilisateurMob->matricule.')' }}</option>
                              @endforeach                         
                            </select>
                        </div> --}}
                        <div id="app5">
                            <insp-ag eventid="{{ Session::get("event_id") }}"></insp-ag>
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
            <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" >
                <thead>
                    <tr>
                        <th>N°</th>
                        
                        
                        <th>Matricule</th>
                        <th>Nom </th>
                        <th>Prénom </th>
                       
                        <th>Désignation zone</th>
                    
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($zonesUtilisateus as $zonesUtilisateu)
                        <tr class=""> 
                            <td>  {{ $loop->index +1}} </td>
                            
                            {{-- <td class="tdlibelle">  {{ $evenement->id_const  }}  --}}
                            <td class="tdlibelle">  {{ $zonesUtilisateu->matricule  }}   </td>
                            <td class="tdlibelle">  {{ $zonesUtilisateu->nom }}   </td>
                            <td class="tdlibelle">  {{ $zonesUtilisateu->prenom }}   </td>
                           
                            <td class="tdlibelle">  {{ $zonesUtilisateu->nom_zone }}   </td>
                            
                            
                          
                            <td>
                          {{-- @if($privilege->modification) <a href="{{route('evenements.edit',$evenement->id)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a> @endif --}}
                          @if(true)  <a href="{{route('evenements.edit',$zonesUtilisateu->id)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                            </td>
                        </tr> 
                        
                    @endforeach
                </tbody>
                  
            </table>
        </div>
               
            </div>
        </div>
    </div>  
    @else
    <img src="{{ asset('images/event.png') }}" alt="">
    @endif
@endsection


