@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">status juridique</a></li>
        <li class="active">Liste des status juridique</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Liste status juridique</strong><small> table</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un status juridique
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('status_juridique.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="id_statu_j" class=" form-control-label">code status <span class="text-danger">*</span></label>
                                <input type="text" id="id_statu_j" placeholder="" class="form-control @error('id_statu_j') is-invalid @enderror" name="id_statu_j" value="{{ old('id_statu_j') }}"autofocus>
                                @error('id_statu_j')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                        
                                <div class="form-group ">
                                    <label for="descreption_s" class=" form-control-label">descreption<span class="text-danger">*</span></label>
                                    <input type="text" id="descreption_s" placeholder="" class="form-control @error('descreption_s') is-invalid @enderror" name="descreption_s" value="{{ old('descreption_s') }}">
                                    @error('descreption_s')
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


 @include('listes_predefinies.status_juridiques.tblaffichage_status_juridique') 


</div>
               
</div>
</div>
</div> 


@endsection