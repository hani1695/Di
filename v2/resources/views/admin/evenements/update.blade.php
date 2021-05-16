@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('evenements.index')}}">evenements</a></li>
        <li class="active">Modification </li>
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
 
 <script src="/assets/map/js/initUE.js"></script>
 
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des evenements - Modification</strong><small>Formulaire</small></div>
            <div class="card-header">
                @include('admin.messages')
                </div>
            <div class="card-body card-block">
                    

                <form method="POST" action="{{ route('evenements.update',$evenement_enr->id) }}"> @method('PATCH')
                    <div class="form-group">
                        <label for="description" class=" form-control-label">Description <span
                                class="text-danger">*</span></label>
                        <input type="text" id="description" placeholder="Description" class="form-control @error('description') is-invalid @enderror"
                            name="description" value="{{ $evenement_enr->description }}">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_creation" class=" form-control-label">Date <span
                                class="text-danger">*</span></label>
                        <input type="date" id="date_creation"  class="form-control @error('date_creation') is-invalid @enderror"
                            name="date_creation" value="{{ $evenement_enr->date_creation }}">
                            @error('date_creation')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="wilaya">Wilaya de l'évènement <span class="text-danger">*</span></label>
                        <select class="form-control @error('wilaya_id') is-invalid @enderror" id="wilaya" name="wilaya_id" required>
                            <option disabled>Selectionner wilaya de l'évènement </option>
                            @foreach ($wilayas as $wilaya)
                                <option value="{{ $wilaya->code_w }}" {{ ($wilaya->code_w == $evenement_enr->wilaya_id) ? 'selected' : '' }}>{{ $wilaya->nom_w }} ({{ $wilaya->code_w }})</option>
                            @endforeach
                        </select>
                        @error('wilaya_id')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>                                
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class=" form-control-label">Les wilayas affectées par l'évènement <span class="text-danger">*</span></label><br>
                        <select class="js-example-basic-multiple @error('wilayas') is-invalid @enderror" name="wilayas[]" multiple="multiple" style="width: 100%;">
                            @foreach ($wilayas as $wilaya)
                                <option value="{{ $wilaya->code_w }}" 
                                @foreach ($wilayasSinistrees as $w)
                                    @if ($wilaya->code_w == $w->code_w)
                                        selected 
                                    @endif
                                @endforeach 
                                >{{ $wilaya->nom_w }} ({{ $wilaya->code_w }})</option>
                            @endforeach
                        </select>
                        @error('wilayas')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>                                
                    @enderror
                    </div>
                    <div id="app3">
                        <seisme-update typeevenement={{ $evenement_enr->type_evenement}} id="{{ $evenement_enr->id }}" />
                    </div>
                    
                      
                    @csrf
                    <button id="payment-button" type="button" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                        <i class="fa fa-save fa-lg "></i>
                        <span id="payment-button-amount">Enregistrer</span>                            
                    </button>
                    
                    
                </form>


        
<div id="map" class="mt-3"></div>


    
    <div id="info">No countries selected</div>
    <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>



                
                    @include('admin.evenements.tblaffichage') 
                    
           </div>
        
            </div>
    </div>
</div>

<script>
       
    var test = "{{$wilayaA}}"; 
   
    
    </script>




@endsection

