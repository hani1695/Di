@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Districts</a></li>
        <li class="active">Liste District</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Liste des Districts</strong><small> table</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une district
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('district.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="id_district" class=" form-control-label">code district<span class="text-danger">*</span></label>
                                <input type="text" id="id_district" placeholder="code" class="form-control @error('id_district') is-invalid @enderror" name="id_district" value="{{ old('id_district') }}"autofocus>
                                @error('id_district')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                            {{-- <div class="form-row"> --}}
                                <div class="form-group ">
                                    <label for="num_district" class=" form-control-label"> numero district<span class="text-danger">*</span></label>
                                    <input type="text" id="num_district" placeholder="numero" class="form-control @error('num_district') is-invalid @enderror" name="num_district" value="{{ old('num_district') }}">
                                    @error('num_district')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                               
                                <div class="form-group ">
                                    <label for="observation" class=" form-control-label">observation <span class="text-danger">*</span></label>
                                    <input type="observation" id="observation" placeholder="observation" class="form-control @error('observation') is-invalid @enderror" value="{{ old('observation') }}"name="observation" >
                                    @error('observation')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="geom" class=" form-control-label">geom <span class="text-danger">*</span></label>
                                        <input type="text" id="geom" placeholder="geom" class="form-control @error('geom') is-invalid @enderror" value="{{ old('geom') }}"name="geom" >
                                        @error('geom')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                            {{-- </div> --}}
                               <livewire:wilaya-commune>
           
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


 @include('decoupage.districts.tblaffichagedistrict') 


</div>
               
</div>
</div>
</div> 


@endsection