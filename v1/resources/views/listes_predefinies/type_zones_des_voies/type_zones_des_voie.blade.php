@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">type des zones</a></li>
        <li class="active">types des zones</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>type zones</strong><small> table</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un type des zones
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('zone.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="id_type_z" class=" form-control-label">code type zone <span class="text-danger">*</span></label>
                                <input type="text" id="id_type_z" placeholder="" class="form-control @error('id_type_z') is-invalid @enderror" name="id_type_z" value="{{ old('id_type_z') }}"autofocus>
                                @error('id_type_z')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                        
                                <div class="form-group ">
                                    <label for="descreption_t_z" class=" form-control-label">descreption<span class="text-danger">*</span></label>
                                    <input type="text" id="descreption_t_z" placeholder="" class="form-control @error('descreption_t_z') is-invalid @enderror" name="descreption_t_z" value="{{ old('descreption_t_z') }}">
                                    @error('descreption_t_z')
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


 @include('listes_predefinies.type_zones_des_voies.tblaffichage_type_zones_des_voie') 


</div>
               
</div>
</div>
</div> 


@endsection