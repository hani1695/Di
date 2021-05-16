@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Découpage Administratif</a></li>
        <li class="active"> Daira</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des dairas</strong><small> </small></div>
            @include('admin.messages')

            <div class="card-body card-block">
            

                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une daira
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('daira.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="code_d" class=" form-control-label">Code<span class="text-danger">*</span></label>
                                <input type="text" id="code_d"  class="form-control @error('code_d') is-invalid @enderror" name="code_d" value="{{ old('code_d') }}"autofocus>
                                @error('code_d')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                            {{-- <div class="form-row"> --}}
                                <div class="form-group ">
                                    <label for="nom_d" class=" form-control-label">Daira<span class="text-danger">*</span></label>
                                    <input type="text" id="nom_d"  class="form-control @error('nom_d') is-invalid @enderror" name="nom_d" value="{{ old('nom_d') }}">
                                    @error('nom_d')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="siege_d" class=" form-control-label">Siège<span class="text-danger"></span></label>
                                    <input type="siege_d" id="siege_d"  class="form-control @error('siege_d') is-invalid @enderror" value="{{ old('siege_d') }}"name="siege_d" >
                                    @error('siege_d')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                </div>
                            {{-- </div> --}}
                                {{-- <div class="form-row"> --}}
                                <div class="form-group ">
                                    <label for="autre_nom_d" class=" form-control-label">Autre nom daira<span class="text-danger"></span></label>
                                    <input type="text" id="autre_nom_d"  class="form-control @error('autre_nom_d') is-invalid @enderror" value="{{ old('autre_nom_d') }}"name="autre_nom_d" >
                                    @error('autre_nom_d')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="source_donnees" class=" form-control-label">Source dse données<span class="text-danger"></span></label>
                                    <input type="text" id="source_donnees"  class="form-control @error('source_donnees') is-invalid @enderror" value="{{ old('source_donnees') }}"name="source_donnees">
                                    @error('source_donnees')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            {{-- </div> --}}
                   {{--          <div id="app2"><dr-agence nomdr="{{ old('nom_dr') }}" st="{{ old('structure') }}" org="{{ old('organisme') }}" nomdrerror="@error('nom_dr'){{ $message }}@enderror" sterror="@error('structure'){{ $message }}@enderror" orgerror="@error('organisme'){{ $message }}@enderror" /></div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">geom_w <span class="text-danger">*</span></label>
                                <select class="form-control @error('profile') is-invalid @enderror" id="exampleFormControlSelect1" name="profile">
                                    <option value="" selected disabled>Séléctionner Le Profil</option>
                                      
                                </select>     
                                @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                                                     
                            </div> 
                            <div class="form-group">
                                <label for="exampleFormControlFile1">geom_w </label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>--}}
                            
                            
                            
                           {{-- <div class="form-row"> --}}
                                {{-- <div class="form-group ">
                                    <label for="geom_d" class=" form-control-label">geom<span class="text-danger">*</span></label>
                                    <input type="text" id="geom_d" placeholder="geom" class="form-control  @error('geom_d') is-invalid @enderror" name="geom_d" >
                                    @error('geom_d')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                    @enderror
                                </div> --}}
                                  
                                <div class="form-group ">
                                    <label for="exampleFormControlSelect1">Wilaya <span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_code_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_code_wilaya">
                                        @if (old('fk_code_wilaya'))
                                        @foreach ($wilayas as $wilaya)
                                        @if (old('fk_code_wilaya')==$wilaya->code_w)
                                        <option selected value="{{old('fk_code_wilaya')}}"> {{ $wilaya->code_w }}-{{$wilaya->nom_w}}</option>
                                        @endif
                                        @endforeach
                                        @else
                                        <option value="" selected disabled>Séléctionner la wilaya</option>
                                        @endif
                                        @foreach ($wilayas as $wilaya)
                                        <option value="{{ $wilaya->code_w }}">{{ $wilaya->code_w }}-{{ $wilaya->nom_w }}</option>
                                        @endforeach
                                    </select>     
                                    @error('fk_code_wilaya')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                                {{-- </div> --}}
                    {{--              <div class="form-group ">
                                    <label for="password_confirmation" class=" form-control-label">Confirmation mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" id="password_confirmation" placeholder="Confirmation mot de passe" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                                </div>--}}
                                
                            
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
                @include('decoupage.dairas.tblaffichagedaira') 



            </div>
           
        </div>
    </div>
</div> 

@endsection

