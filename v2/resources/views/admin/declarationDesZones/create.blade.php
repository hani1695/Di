@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Évènements</a></li>
        <li class="active">déclaration des zones</li>
    </ol>
@endsection
@section('content')
@if ( Session::has('event_id'))

    <div class="row" style="margin-bottom: 100px;">
    
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Créer une zone d'inspection</strong><small> Formulaire</small></div>
                <div class="card-header">
                @include('admin.messages')
                @if ( $privilege->insertion )
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une zone
                </a>
                <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                <div class="card-body card-block">
                    <form method="POST" action="{{ route('declarationZone.store') }}">
                        {{-- {{ route('evenements.store') }} --}}
                        <div class="form-group">
                            <label for="nom_zone" class=" form-control-label">Désignation zone<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="nom_zone" placeholder="Désignation zone" class="form-control @error('nom_zone') is-invalid @enderror"
                                name="nom_zone"  value="{{ old('nom_zone') }}" autofocus required>
                                @error('nom_zone')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="num_zone" class=" form-control-label">Num zone<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="num_zone"  class="form-control @error('code_w') is-invalid @enderror"
                                name="num_zone" value="" required>
                        </div> --}}

                        <div class="form-group">
                            <label for="observation" class=" form-control-label">Observation</label>
                            <input type="text" id="observation"  class="form-control @error('observation') is-invalid @enderror"
                                name="observation" value="{{ old('observation') }}" placeholder="Observation" required>
                                @error('observation')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="geom" class=" form-control-label">geom<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="geom"  class="form-control @error('code_w') is-invalid @enderror"
                                name="geom" value="" >
                        </div>
                         --}}
                       {{-- <livewire:wilaya-commune> --}}
                        <div class="form-group">
                            <label for="description" class=" form-control-label">Les communes de la zone <span class="text-danger">*</span></label><br>
                            <select class="js-example-basic-commune  @error('communes') is-invalid @enderror" name="communes[]" multiple="multiple" style="width: 100%;">
                                {{-- @foreach ($communes as $commune)
                                    <option value="{{ $commune->code_c }}" >{{ $commune->nom_c }} ({{ $commune->code_c }})</option>
                                @endforeach --}}
                                @foreach ($communes as $commune)
                                <option value="{{ $commune->code_c }}" 
                                @if( ! empty (old('communes')))
                                    @foreach (old('communes') as $key => $w)
                                        @if ($commune->code_c == $w)
                                            selected 
                                        @endif
                                    @endforeach 
                                @endif
                                >{{ $commune->nom_c }} ({{ $commune->code_c }})</option>
                            @endforeach
                            </select>
                            @error('communes')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
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
        @include('admin.declarationDesZones.tblaffichage') 
        </div>
               
            </div>
        </div>
    </div>  

    @else
    <img src="{{ asset('images/event.png') }}" alt="">
    @endif
    
@endsection


