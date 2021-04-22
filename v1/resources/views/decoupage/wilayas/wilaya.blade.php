@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Decoupage Administratif</a></li>
        <li class="active">Wilaya</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Liste des Wilayas</strong><small> table</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une  Wilaya
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('wilaya.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="code_w" class=" form-control-label">code wilaya<span class="text-danger">*</span></label>
                                <input type="text" id="code_w" placeholder="" class="form-control @error('code_w') is-invalid @enderror" name="code_w" value="{{ old('code_w') }}"autofocus>
                                @error('code_w')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                            {{-- <div class="form-row"> --}}
                                <div class="form-group ">
                                    <label for="nom_w" class=" form-control-label"> nom wilaya<span class="text-danger">*</span></label>
                                    <input type="text" id="nom_w" placeholder="" class="form-control @error('nom_w') is-invalid @enderror" name="nom_w" value="{{ old('nom_w') }}">
                                    @error('nom_w')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="nom_w_arb" class=" form-control-label"> nom wilaya arabe<span class="text-danger">*</span></label>
                                    <input type="text" id="nom_w_arb" placeholder="" class="form-control @error('nom_w_arb') is-invalid @enderror" value="{{ old('nom_w_arb') }}"name="nom_w_arb">
                                    @error('nom_w_arb')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            {{-- </div> --}}
                            <div class="form-group">
                                <label for="siege_w" class=" form-control-label">siege wilaya <span class="text-danger">*</span></label>
                                <input type="siege_w" id="siege_w" placeholder="" class="form-control @error('siege_w') is-invalid @enderror" value="{{ old('siege_w') }}"name="siege_w" >
                                @error('siege_w')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="autre_nom_w" class=" form-control-label">autre nom wilaya <span class="text-danger">*</span></label>
                                <input type="text" id="autre_nom_w" placeholder="" class="form-control @error('autre_nom_w') is-invalid @enderror" value="{{ old('autre_nom_w') }}"name="autre_nom_w" >
                                @error('autre_nom_w')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
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
                                <div class="form-group ">
                                    <label for="geom_w" class=" form-control-label">geom wilaya <span class="text-danger">*</span></label>
                                    <input type="text" id="geom_w" placeholder="geom_w" class="form-control  @error('geom_w') is-invalid @enderror" name="geom_w">
                                    @error('geom_w')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                    @enderror
                                </div>
                                
                    {{--              <div class="form-group col-6">
                                    <label for="password_confirmation" class=" form-control-label">Confirmation mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" id="password_confirmation" placeholder="Confirmation mot de passe" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                                </div>--}}
                                
                            {{-- </div>  --}}
                            
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


 @include('decoupage.wilayas.tblaffichagewilaya') 


</div>
               
</div>
</div>
</div> 


@endsection