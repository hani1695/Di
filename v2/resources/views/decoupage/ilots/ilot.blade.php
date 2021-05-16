@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Adressages</a></li>
        <li class="active">Liste Ilot</li>
    </ol>
@endsection

@section('content')
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Créer un évènement</strong><small> Formulaire</small></div>
            @include('admin.messages')
            <div class="card-body card-block">
            

                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un ilot
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('ilot.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="id_ilot_" class=" form-control-label">Code ilot<span class="text-danger">*</span></label>
                                <input type="text" id="id_ilot_" placeholder="code" class="form-control @error('id_ilot_') is-invalid @enderror" name="id_ilot_" value="{{ old('id_ilot_') }}"autofocus>
                                @error('id_ilot_')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                        
                            {{-- <div class="form-row"> --}}
                                <div class="form-group ">
                                    <label for="nom_ilot" class=" form-control-label">  Ilot<span class="text-danger">*</span></label>
                                    <input type="text" id="nom_ilot" placeholder="nom ilot" class="form-control @error('nom_ilot') is-invalid @enderror" name="nom_ilot" value="{{ old('nom_ilot') }}">
                                    @error('nom_ilot')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="num_ilot" class=" form-control-label"> Numero ilot<span class="text-danger">*</span></label>
                                    <input type="text" id="num_ilot" placeholder="num ilot" class="form-control @error('num_ilot') is-invalid @enderror" name="num_ilot" value="{{ old('num_ilot') }}">
                                    @error('num_ilot')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            {{-- </div> --}}
                            <div class="form-group">
                                <label for="nom_arb" class=" form-control-label">Ilot en arabe<span class="text-danger"></span></label>
                                <input type="text" id="nom_arb" placeholder="nom arabe" class="form-control @error('nom_arb') is-invalid @enderror" name="nom_arb" value="{{ old('nom_arb') }}"autofocus>
                                @error('nom_arb')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                            {{-- <div class="form-row"> --}}
                                <div class="form-group ">
                                    <label for="observation" class=" form-control-label">Observation <span class="text-danger"></span></label>
                                    <input type="observation" id="observation" placeholder="observation" class="form-control @error('observation') is-invalid @enderror" value="{{ old('observation') }}"name="observation" >
                                    @error('observation')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                </div>
                          
                                
                                {{-- <div class="form-group ">
                                    <label for="geom" class=" form-control-label">geom <span class="text-danger">*</span></label>
                                    <input type="text" id="geom" placeholder="geom" class="form-control @error('geom') is-invalid @enderror" value="{{ old('geom') }}"name="geom" >
                                    @error('geom')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div> --}}
                            {{-- </div> --}}
                            <livewire:commune-district>

                             {{-- <div class="form-row">
                                <div class="form-group ">
                                    <label for="exampleFormControlSelect1">numero district <span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_district') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_district">
                                        <option value="" selected disabled>Séléctionner district</option>
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->id_district }}"> {{ $district->num_district }}</option>
                                      @endforeach
                                    </select>     
                                    @error('fk_district')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                                <div class="form-group ">
                                    <label for="exampleFormControlSelect1">commune <span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_commune') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_commune">
                                        <option value="" selected disabled>Séléctionner commune</option>
                                        @foreach ($communes as $commune)
                                        <option value="{{ $commune->code_c }}"> {{ $commune->nom_c }}</option>
                                      @endforeach
                                    </select>     
                                    @error('fk_commune')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                            </div> --}}
           
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
                @include('decoupage.ilots.tblaffichageilot') 


            </div>
           
        </div>
    </div>
</div>  


@endsection