@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">constructions</a></li>
        <li class="active"> construction</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>constructions</strong><small> table</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une construction
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('construction.store') }}" method="post" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                    <div class="form-group col-6">
                                       <label for="id_const" class=" form-control-label">code construction<span class="text-danger">*</span></label>
                                       <input type="text" id="id_const" placeholder="code" class="form-control @error('id_const') is-invalid @enderror" name="id_const" value="{{ old('id_const') }}"autofocus>
                                       @error('id_const')
                                           <span class="invalid-feedback" role="alert">
                                               {{ $message }}
                                           </span>                                
                                       @enderror
                                   </div> 
                                    <div class="form-group col-6">
                                        <label for="nom" class=" form-control-label">nom<span class="text-danger">*</span></label>
                                        <input type="text" id="nom" placeholder="nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                            </div>

                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="nom_arab" class=" form-control-label"> nom arabe<span class="text-danger">*</span></label>
                                            <input type="text" id="nom_arab" placeholder="nom_arab" class="form-control @error('nom_arab') is-invalid @enderror" name="nom_arab" value="{{ old('nom_arab') }}">
                                            @error('nom_arab')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                        </div>
                                        <div class="form-group col-6" >
                                            <label for="usage">usage<span class="text-danger">*</span></label>
                                            <select class="form-control @error('usage') is-invalid @enderror" id="usage" name="usage" wire:model='commune_id' >
                                                <option value="" selected disabled>S??l??ctionner usage</option>
                                                @foreach ($usages as $usage)
                                                <option value="{{ $usage->Libelle_ouvr2 }}"> {{ $usage->Libelle_ouvr2 }}</option>
                                              @endforeach
                                            </select>     
                                            @error('usage')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                                                
                                        </div> 
                                            {{-- <div class="form-group col-6">
                                                <label for="usage" class=" form-control-label">usage<span class="text-danger">*</span></label>
                                                <input type="text" id="usage" placeholder="usage" class="form-control @error('usage') is-invalid @enderror" value="{{ old('usage') }}"name="usage">
                                                @error('usage')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>                                
                                                @enderror
                                            </div> --}}
                                    </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="etat_const" class=" form-control-label">etat construction<span class="text-danger">*</span></label>
                                    <input type="text" id="etat_const" placeholder="etat_const" class="form-control @error('etat_const') is-invalid @enderror" value="{{ old('etat_const') }}"name="etat_const" >
                                    @error('etat_const')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="geom" class=" form-control-label">geom<span class="text-danger">*</span></label>
                                    <input type="text" id="geom" placeholder="geom" class="form-control @error('geom') is-invalid @enderror" value="{{ old('geom') }}"name="geom" >
                                    @error('geom')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                {{-- <div class="form-group col-6">
                                    <label for="daira" class=" form-control-label">daira <span class="text-danger">*</span></label>
                                    <input type="text" id="daira" placeholder="daira" class="form-control @error('daira') is-invalid @enderror" value="{{ old('daira') }}"name="daira" >
                                    @error('daira')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div> --}}
                            </div>

                            {{-- <div class="form-group">
                                <label for="wilaya" class=" form-control-label">wilaya<span class="text-danger">*</span></label>
                                <input type="text" id="wilaya" placeholder="wilaya" class="form-control @error('wilaya') is-invalid @enderror" value="{{ old('wilaya') }}"name="wilaya" >
                                @error('wilaya')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> --}}
                            
                                

                            <livewire:wilaya-commune-construction>

                            {{-- <livewire:decoupage> --}}

                                {{-- 
                                                               <div class="form-row">
                                    <div class="form-group col-6">
                                    <label for="exampleFormControlSelect1">commune<span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_id_comn') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_comn">
                                        <option value="" selected disabled>S??l??ctionner commune</option>
                                        @foreach ($communes as $commune)
                                        <option value="{{ $commune->code_c }}"> {{ $commune->nom_c }}</option>
                                      @endforeach
                                    </select>     
                                    @error('fk_id_comn')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                           
                                   
                                <div class="form-group col-6">
                                    <label for="exampleFormControlSelect1">wilaya<span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_id_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_wilaya">
                                        <option value="" selected disabled>S??l??ctionner wilaya</option>
                                        @foreach ($wilayas as $wilaya)
                                        <option value="{{ $wilaya->code_w }}"> {{ $wilaya->nom_w }}</option>
                                      @endforeach
                                    </select>     
                                    @error('fk_id_wilaya')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                            </div> 

                                
                                    
                                    <div class="form-group ">
                                        <label for="exampleFormControlSelect1">daira<span class="text-danger">*</span></label>
                                        <select class="form-control @error('fk_id_daira') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_daira">
                                            <option value="" selected disabled>S??l??ctionner daira</option>
                                            @foreach ($dairas as $daira)
                                            <option value="{{ $daira->code_d }}"> {{ $daira->nom_d }}</option>
                                          @endforeach
                                        </select>     
                                        @error('fk_id_daira')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                                             
                                    </div> 
                              
                                <div class="form-group ">
                                    <label for="exampleFormControlSelect1">numero district<span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_district') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_district">
                                        <option value="" selected disabled>S??l??ctionner district</option>
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
                                    <label for="exampleFormControlSelect1">ilot<span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_ilot') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_ilot">
                                        <option value="" selected disabled>S??l??ctionner ilot</option>
                                        @foreach ($ilots as $ilot)
                                        <option value="{{ $ilot->id_ilot_ }}"> {{ $ilot->nom_ilot }}</option>
                                      @endforeach
                                    </select>     
                                    @error('fk_ilot')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror  
                                </div>  --}}
                            
                            @csrf    
                                            
                            <div   class="form-group ">
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


 @include('constructions.constructions.tblaffichageconstruction') 


</div>
               
</div>
</div>
</div> 


@endsection