@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">liste des mesures immediates</a></li>
        <li class="active">Liste des liste des mesures immediates</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>liste des mesures immediates</strong><small> table</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une mesure
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('mesure.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="id_mesure" class=" form-control-label">code mesure <span class="text-danger">*</span></label>
                                <input type="text" id="id_mesure" placeholder="code mesure" class="form-control @error('id_mesure') is-invalid @enderror" name="id_mesure" value="{{ old('id_mesure') }}"autofocus>
                                @error('id_mesure')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                        
                                <div class="form-group ">
                                    <label for="descreption_mesure" class=" form-control-label">descreption<span class="text-danger">*</span></label>
                                    <input type="text" id="descreption_mesure" placeholder="descreption mesure" class="form-control @error('descreption_mesure') is-invalid @enderror" name="descreption_mesure" value="{{ old('descreption_mesure') }}">
                                    @error('descreption_mesure')
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


 @include('listes_predefinies.liste_des_mesures_immediates.tblaffichage_liste_des_mesures_immediate') 


</div>
               
</div>
</div>
</div> 


@endsection