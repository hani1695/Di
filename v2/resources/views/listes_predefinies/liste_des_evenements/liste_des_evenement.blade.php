@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">listes prédéfinies</a></li>
        <li class="active">Type d'évenement</li>
    </ol>
@endsection

@section('content')
<div class="row " style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong> Types d'évenements</strong><small> </small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une type d'évenement
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('typeevenement.store') }}" method="post" >
                            
                        
                                <div class="form-group ">
                                    <label for="libelle" class=" form-control-label">Libelle<span class="text-danger">*</span></label>
                                    <input type="text" id="libelle" placeholder="libelle" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}">
                                    @error('libelle')
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


 @include('listes_predefinies.liste_des_evenements.tblaffichage_liste_des_evenement') 


</div>
               
</div>
</div>
</div> 


@endsection