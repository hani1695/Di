@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">listes prédéfinies</a></li>
        <li class="active">Zone & voie</li>
    </ol>
@endsection

@section('content')
<div class="row " style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Zone & voie</strong><small> </small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter zone & voie
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('typezonevoie.store') }}" method="post" enctype="multipart/form-data">
                             
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Adresse<span class="text-danger">*</span></label>
                                <select class="form-control @error('fk_adresse') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_adresse">
                                    <option value="" selected disabled>Séléctionner un type d'adresse</option>
                                    @foreach ($adresses as $adresse)
                                    <option value="{{ $adresse->id_type_adr }}"> {{ $adresse->descreption_t_adr }}</option>
                                  @endforeach
                                </select>     
                                @error('fk_adresse')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                                
                            </div> 
                        
                                <div class="form-group ">
                                    <label for="descreption_z_v" class=" form-control-label">Designation<span class="text-danger">*</span></label>
                                    <input type="text" id="descreption_z_v" placeholder="" class="form-control @error('descreption_z_v') is-invalid @enderror" name="descreption_z_v" value="{{ old('descreption_z_v') }}">
                                    @error('descreption_z_v')
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


 @include('listes_predefinies.type_zones_voies.tblaffichage_type_zones_voie') 


</div>
               
</div>
</div>
</div> 


@endsection