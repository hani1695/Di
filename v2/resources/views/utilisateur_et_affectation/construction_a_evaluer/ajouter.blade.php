@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">utilisateur et affectation</a></li>
        <li class="active">construction a evalue</li>
    </ol>
@endsection
@section('content')
@if ( Session::has('event_id'))
 
    <div class="row" style="margin-bottom: 100px;">
    
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Créer une construction a evalue</strong><small> Formulaire</small></div>
                <div class="card-header">
                @include('admin.messages')
                @if ( $privilege->insertion )
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une construction à évaluer
                </a>
                <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                <div class="card-body card-block">
                    {{-- {{route('utilisateur_mobilise.store')}} --}}
                    <form method="POST" action="{{ route('constructionAevaluer.store') }}">
                        <div id="app4">
                            <construction eventid={{ Session::get("event_id") }}></construction>
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
        @include('utilisateur_et_affectation.construction_a_evaluer.table') 
        </div>
            </div>
        </div>
    </div>  
@else
<img src="{{ asset('images/event.png') }}" alt="">
@endif
@endsection


