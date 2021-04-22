@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">type d'usage</a></li>
        <li class="active">Liste des type d'usage</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Liste type d'usage</strong><small> table</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un type d'usage
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('usage.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="id_usage" class=" form-control-label">code usage <span class="text-danger">*</span></label>
                                <input type="text" id="id_usage" placeholder="" class="form-control @error('id_usage') is-invalid @enderror" name="id_usage" value="{{ old('id_usage') }}"autofocus>
                                @error('id_usage')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                        
                                <div class="form-group ">
                                    <label for="descreption_u" class=" form-control-label">descreption<span class="text-danger">*</span></label>
                                    <input type="text" id="descreption_u" placeholder="" class="form-control @error('descreption_u') is-invalid @enderror" name="descreption_u" value="{{ old('descreption_u') }}">
                                    @error('descreption_u')
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


 @include('listes_predefinies.type_usages.tblaffichage_type_usage') 


</div>
               
</div>
</div>
</div> 


@endsection