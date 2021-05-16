@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('construction.index')}}">Adressages</a></li>
        <li class="active">Adresse de construction </li>
    </ol>
@endsection

@section('content')
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Adresse de construction</strong><small> </small></div>
            <div class="card-body card-block">
            
                <div class="form-row">
                    <div class="form-group col-6">
                        <div class=" form-control-label">
                            <span class=" form-control-label" id="basic-addon1">Code</span>
                        </div>
                        <input type="text"  name="id_const" value="{{ $construction->id_const }}" id="id_const" class="form-control {{$errors->has('id_const')? 'is-invalid' :''}}" placeholder="id_const" aria-label="id_const" aria-describedby="basic-addon1" readonly>
                            @error('id_const')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror    
                    </div>
                    <div class="form-group col-6">
                        <div class=" form-control-label">
                            <span class=" form-control-label" id="basic-addon1">Désignation construction</span>
                        </div>
                        <input type="text"  name="nom" value="{{ $construction->nom }}" id="nom" class="form-control {{$errors->has('nom')? 'is-invalid' :''}}" placeholder="nom" aria-label="nom" aria-describedby="basic-addon1" readonly>
                            @error('nom')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror    
                    </div>
                </div>
                <div class="form-row">
    
                    <div class="form-group col-6">
                        <div class=" form-control-label">
                            <span class=" form-control-label" id="basic-addon1">état construction</span>
                        </div>
                        <input type="text"  name="etat_const" value="{{ $construction->etat_const }}" id="etat_const" class="form-control {{$errors->has('etat_const')? 'is-invalid' :''}}" placeholder="etat_const" aria-label="etat_const" aria-describedby="basic-addon1" readonly>
                            @error('etat_const')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror    
                    </div>
                     
                    <div class="form-group col-6">
                        <div class=" form-control-label">
                            <span class=" form-control-label" id="basic-addon1">usage</span>
                        </div>
                        <input type="text"  name="usage" value="{{ $construction->usage }}" id="usage" class="form-control {{$errors->has('usage')? 'is-invalid' :''}}" placeholder="usage" aria-label="usage" aria-describedby="basic-addon1" readonly>
                            @error('usage')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror    
                    </div>
                </div>
    
                    <div class="form-group ">
                        <div class=" form-control-label">
                            <span class=" form-control-label" id="basic-addon1">wilaya</span>
                        </div>
                        <input type="text"  name="wilaya" value="{{ $construction->wilaya }}" id="wilaya" class="form-control {{$errors->has('wilaya')? 'is-invalid' :''}}" placeholder="wilaya" aria-label="wilaya" aria-describedby="basic-addon1" readonly>
                            @error('wilaya')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror    
                    </div>
                
    
    
                    @include('admin.messages')

                    @if ( $privilege->insertion)
                    <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                        Ajouter une adresse de construction
                    </a>
                       <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                      <div class="card card-body">
                            <form action="{{ route('constructionadresse.store') }}" method="post" enctype="multipart/form-data">
                                
                                <div class="form-row">
                                        <div class="form-group col-6">
                                           <label for="id_constp" class=" form-control-label">code constuction adresse<span class="text-danger">*</span></label>
                                           <input type="text" id="id_constp" placeholder="code" class="form-control @error('id_constp') is-invalid @enderror" name="id_constp" value="{{ old('id_constp') }}"autofocus>
                                           @error('id_constp')
                                               <span class="invalid-feedback" role="alert">
                                                   {{ $message }}
                                               </span>                                
                                           @enderror
                                       </div> 
                                        <div class="form-group col-6">
                                            <label for="nomp" class=" form-control-label">Désignation<span class="text-danger">*</span></label>
                                            <input type="text" id="nomp" placeholder="nom" class="form-control @error('nomp') is-invalid @enderror" name="nomp" value="{{ old('nomp') }}">
                                            @error('nomp')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                        </div>
                                </div>
    
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="nom_arabp" class=" form-control-label">Désignation en arabe<span class="text-danger"></span></label>
                                                <input type="text" id="nom_arabp" placeholder="nom arabe" class="form-control @error('nom_arabp') is-invalid @enderror" name="nom_arabp" value="{{ old('nom_arabp') }}">
                                                @error('nom_arabp')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>                                
                                                @enderror
                                            </div>
    
                                                <div class="form-group col-6">
                                                    <label for="numerop" class=" form-control-label">Numero <span class="text-danger"></span></label>
                                                    <input type="text" id="numerop" placeholder="numero" class="form-control @error('numerop') is-invalid @enderror" value="{{ old('numerop') }}"name="numerop">
                                                    @error('numerop')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>                                
                                                    @enderror
                                                </div>
                                        </div>
    
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="cotep" class=" form-control-label">Cote<span class="text-danger"></span></label>
                                        <input type="text" id="cotep" placeholder="cote" class="form-control @error('cotep') is-invalid @enderror" value="{{ old('cotep') }}"name="cotep" >
                                        @error('cotep')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="type_entreep" class=" form-control-label">Type d'entrée <span class="text-danger"></span></label>
                                        <input type="text" id="type_entreep" placeholder="type entree" class="form-control @error('type_entreep') is-invalid @enderror" value="{{ old('type_entreep') }}"name="type_entreep" >
                                        @error('type_entreep')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
    
                                <div class="form-group col-6">
                                    <label for="pretypep" class=" form-control-label">pretype<span class="text-danger"></span></label>
                                    <input type="text" id="pretypep" placeholder="pretype" class="form-control @error('pretypep') is-invalid @enderror" value="{{ old('pretypep') }}"name="pretypep" >
                                    @error('pretypep')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="nom_ruep" class=" form-control-label">Rue <span class="text-danger"></span></label>
                                    <input type="text" id="nom_ruep" placeholder="nom rue" class="form-control @error('nom_ruep') is-invalid @enderror" value="{{ old('nom_ruep') }}"name="nom_ruep" >
                                    @error('nom_ruep')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>
    
                              {{-- <livewire:wilaya-commune-construction :wilaya="old('fk_id_wilaya')" :commune="old('fk_id_comn')">  --}}
    
                            <livewire:type-zone-voie :nature="old('nature_zonep')" :type="old('nom_zonep')">
    
                                <div class="form-row">
                                   <div class="form-group col-6">
                                       <label for="nom_zone_arp" class=" form-control-label">Zone en arabe<span class="text-danger"></span></label>
                                       <input type="text" id="nom_zone_arp" placeholder="nom zone arabe" class="form-control @error('nom_zone_arp') is-invalid @enderror" value="{{ old('nom_zone_arp') }}"name="nom_zone_arp" >
                                       @error('nom_zone_arp')
                                           <span class="invalid-feedback" role="alert">
                                               {{ $message }}
                                           </span>                                
                                       @enderror
                                   </div>
                                    <div class="form-group col-6">
                                        <label for="nom_rue_arp" class=" form-control-label">Rue en arabe<span class="text-danger"></span></label>
                                        <input type="text" id="nom_rue_arp" placeholder="nom rue arabe" class="form-control  @error('nom_rue_arp') is-invalid @enderror" name="nom_rue_arp" value="{{ old('nom_rue_arp') }}">
                                        @error('nom_rue_arp')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                               
                                        {{-- <div class="form-group col-6">
                                            <label for="nature_zonep" class=" form-control-label">nature zone <span class="text-danger">*</span></label>
                                            <input type="text" id="nature_zonep" placeholder="nature zone" class="form-control  @error('nature_zonep') is-invalid @enderror" name="nature_zonep" value="{{ old('nature_zonep') }}">
                                            @error('nature_zonep')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                            @enderror
                                        </div> --}}
                                    </div>  
                                    {{-- <div class="form-row">
    
                                         <div class="form-group col-6">
                                            <label for="nom_zonep" class=" form-control-label">nom zone<span class="text-danger">*</span></label>
                                            <input type="text" id="nom_zonep" placeholder="nom zone" class="form-control  @error('nom_zonep') is-invalid @enderror" name="nom_zonep" value="{{ old('nom_zonep') }}">
                                            @error('nom_zonep')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                            @enderror
                                        </div> 
                                   
                                </div> --}}
                                <div class="form-row">
    
                                    <div class="form-group col-6">
                                        <label for="nom_adressep" class=" form-control-label">Adresse<span class="text-danger">*</span></label>
                                        <input type="text" id="nom_adressep" placeholder="nom adresse" class="form-control @error('nom_adressep') is-invalid @enderror" value="{{ old('nom_adressep') }}"name="nom_adressep" >
                                        @error('nom_adressep')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nom_adresse_arp" class=" form-control-label">Adresse en arabe<span class="text-danger"></span></label>
                                        <input type="text" id="nom_adresse_arp" placeholder="nom adresse arabe" class="form-control  @error('nom_adresse_arp') is-invalid @enderror" name="nom_adresse_arp" value="{{ old('nom_adresse_arp') }}">
                                        @error('nom_adresse_arp')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
    
                                <div class="form-group col-6">
                                    <label for="occupationp" class=" form-control-label">Occupation <span class="text-danger"></span></label>
                                    <input type="text" id="occupationp" placeholder="occupation " class="form-control @error('occupationp') is-invalid @enderror" value="{{ old('occupationp') }}"name="occupationp" >
                                    @error('occupationp')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="etat_constp" class=" form-control-label">état <span class="text-danger">*</span></label>
                                    <input type="text" id="etat_constp" placeholder="etat construction adresse" class="form-control @error('etat_constp') is-invalid @enderror" value="{{ old('etat_constp') }}"name="etat_constp" >
                                    @error('etat_constp')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>
    
                                {{-- <div >
                                    <label for="daira" class=" form-control-label">daira<span class="text-danger">*</span></label>
                                    <input type="text" id="daira" placeholder="daira" class="form-control  @error('daira') is-invalid @enderror" name="daira" value="{{ old('daira') }}">
                                    @error('daira')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                    @enderror
                                </div>
                           
                            <div class="form-group col-6">
                                <label for="wilaya" class=" form-control-label">wilaya<span class="text-danger">*</span></label>
                                <input type="text" id="wilaya" placeholder="wilaya" class="form-control @error('wilaya') is-invalid @enderror" value="{{ old('wilaya') }}"name="wilaya" >
                                @error('wilaya')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> --}}
                            {{-- <div class="form-row"> --}}
    
                            {{-- <div class="form-group col-6">
                                <label for="geom" class=" form-control-label">geom<span class="text-danger">*</span></label>
                                <input type="text" id="geom" placeholder="geom" class="form-control @error('geom') is-invalid @enderror" value="{{ old('geom') }}"name="geom" >
                                @error('geom')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> --}}
                           
                            <div class="form-group" >
                                <label for="exampleFormControlSelect1">Construction<span class="text-danger">*</span></label>
                                <select class="form-control @error('fk_id_const') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_const" wire:model='commune_id' value="{{ old('commune_id') }}" >
                                    <option value="{{ $construction->id_const }}" selected >{{$construction->nom}}</option>
                                    {{-- @foreach ($constructions as $constructions)
                                    <option value="{{ $constructions->id_const }}"> {{ $constructions->nom}}</option>
                                  @endforeach --}}
                                </select>     
                                @error('fk_id_const')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                                                     
                            </div> 
                        {{-- </div> --}}
                        <livewire:wilaya-commune-construction :wilaya="old('fk_id_wilaya')" :commune="old('fk_id_comn')"> 
    
                        {{-- <livewire:wilaya-commune-construction> --}}
    
    
    
                       {{-- <livewire:wilaya-commune-construction-adresse> --}}
                        {{-- <div  id="c1">
                            <label for="exampleFormControlSelect1">fk_id_com<span class="text-danger">*</span></label>
                            <select class="form-control @error('fk_id_com') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_com" wire:model='commune_id' >
                                <option value="" selected disabled>Séléctionner commune</option>
                                @foreach ($communes as $commune)
                                <option value="{{ $commune->code_c }}"> {{ $commune->nom_c }}</option>
                              @endforeach
                            </select>     
                            @error('fk_id_com')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                                                
                        </div>  --}}
                    
                                
                                @csrf                    
                                <div   >
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                                        <i class="fa fa-save fa-lg "></i>
                                        <span id="payment-button-amount">Enregistrer</span>                            
                                    </button>
                                </div>
                            </form>
                       </div>
                      </div>
                    @endif
                    @include('constructions.constructionsadresses.tblaffichageconstructionadresse') 


            </div>
           
        </div>
    </div>
</div>   


@endsection