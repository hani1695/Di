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
                <div class="card-header"><strong>modifier une zone</strong><small> Formulaire</small></div>
                <div class="card-header">
                @include('admin.messages')
                @if ( $privilege->modification )
               
                <div class="card-body card-block">
                    <form method="POST" action="{{ route('declarationZone.update',$zone_mdf->id_zone)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nom_zone" class=" form-control-label">nom <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="nom_zone" placeholder="" class="form-control"
                                name="nom_zone" value="{{$zone_mdf->nom_zone}}" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="num_zone" class=" form-control-label">num zone<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="num_zone"  class="form-control"
                                name="num_zone" value="{{$zone_mdf->num_zone}}" required>
                        </div>

                        <div class="form-group">
                            <label for="observation" class=" form-control-label">observation<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="observation"  class="form-control"
                                name="observation" value="{{$zone_mdf->observation}}" required>
                        </div>
                        <div class="form-group">
                            <label for="geom" class=" form-control-label">geom<span
                                    class="text-danger">*</span></label>
                            <input type="text" id="geom"  class="form-control"
                                name="geom" value="{{$zone_mdf->geom}}" >
                        </div>
                        
                       <livewire:wilaya-commune>

                       
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


