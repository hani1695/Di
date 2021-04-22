@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Évènements</a></li>
        <li class="active">Créer un évènement</li>
    </ol>
@endsection
@section('content')
    <div class="row" style="margin-bottom: 100px;">
    
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Créer un évènement</strong><small> Formulaire</small></div>
                <div class="card-header">
                @include('admin.messages')
                @if ( $privilege->insertion )
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un évènement
                </a>
                <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                <div class="card-body card-block">
                    <form method="POST" action="{{ route('evenements.store') }}">
                        <div class="form-group">
                            <label for="description" class=" form-control-label">Description <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="description" placeholder="Description" class="form-control"
                                name="description" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="date_creation" class=" form-control-label">Date de l'évènement <span
                                    class="text-danger">*</span></label>
                            <input type="date" id="date_creation"  class="form-control"
                                name="date_creation" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="wilaya">Wilaya de l'évènement <span class="text-danger">*</span></label>
                            <select class="form-control" id="wilaya" name="wilaya_id" required>
                                <option selected disabled>Selectionner wilaya de l'évènement </option>
                                @foreach ($wilayas as $wilaya)
                                    <option value="{{ $wilaya->code_w }}" >{{ $wilaya->nom_w }} ({{ $wilaya->code_w }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class=" form-control-label">Les wilayas affectées par l'évènement <span class="text-danger">*</span></label><br>
                            <select class="js-example-basic-multiple " name="wilayas[]" multiple="multiple" style="width: 100%;">
                                @foreach ($wilayas as $wilaya)
                                    <option value="{{ $wilaya->code_w }}" >{{ $wilaya->nom_w }} ({{ $wilaya->code_w }})</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="description" class=" form-control-label">Les wilayas affectées par l'évènement <span class="text-danger">*</span></label><br>
                            <select data-placeholder="  Selectionner toutes les wilayas affectées par l'évènement" multiple class="standardSelect" name="wilayas[]" required>
                                <option value="" label="default"></option>
                                @foreach ($wilayas as $wilaya)
                                    <option value="{{ $wilaya->code_w }}" >{{ $wilaya->nom_w }} ({{ $wilaya->code_w }})</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div id="app1">
                            <seisme />
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
        @include('admin.evenements.tblaffichage') 
        </div>
               
            </div>
        </div>
    </div>  
    
@endsection


