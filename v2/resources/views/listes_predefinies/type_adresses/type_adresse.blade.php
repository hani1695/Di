@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">listes prédéfinies</a></li>
        <li class="active">Adresses</li>
    </ol>
@endsection

@section('content')
<div class="row " style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Liste des adresses</strong><small></small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une adresse
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('type_adresse.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="id_type_adr" class=" form-control-label">Code adresse<span class="text-danger">*</span></label>
                                <input type="text" id="id_type_adr" placeholder="" class="form-control @error('id_type_adr') is-invalid @enderror" name="id_type_adr" value="{{ old('id_type_adr') }}"autofocus>
                                @error('id_type_adr')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                        
                                <div class="form-group ">
                                    <label for="descreption_t_adr" class=" form-control-label">Designation <span class="text-danger">*</span></label>
                                    <input type="text" id="descreption_t_adr" placeholder="" class="form-control @error('descreption_t_adr') is-invalid @enderror" name="descreption_t_adr" value="{{ old('descreption_t_adr') }}">
                                    @error('descreption_t_adr')
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


 @include('listes_predefinies.type_adresses.tblaffichage_type_adresse') 


</div>
               
</div>
</div>
</div> 


@endsection