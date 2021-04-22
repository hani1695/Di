@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">routiers</a></li>
        <li class="active">Liste routier</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Liste des routiers</strong><small> filtre</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un routier
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                    {{-- {{ route('routier.store') }} --}}
                        <form action="{{ route('routier.store') }}" method="post" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                    <div class="form-group col-6">
                                       <label for="id_tr" class=" form-control-label">code<span class="text-danger">*</span></label>
                                       <input type="text" id="id_tr" placeholder="code" class="form-control @error('id_tr') is-invalid @enderror" name="id_tr" value="{{ old('id_tr') }}"autofocus>
                                       @error('id_tr')
                                           <span class="invalid-feedback" role="alert">
                                               {{ $message }}
                                           </span>                                
                                       @enderror
                                   </div> 
                                    <div class="form-group col-6">
                                        <label for="num_route" class=" form-control-label">numero route<span class="text-danger">*</span></label>
                                        <input type="text" id="num_route" placeholder="numero route" class="form-control @error('num_route') is-invalid @enderror" name="num_route" value="{{ old('num_route') }}">
                                        @error('num_route')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                            </div>

                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="classification" class=" form-control-label">classification<span class="text-danger">*</span></label>
                                            <input type="text" id="classification" placeholder="classification" class="form-control @error('classification') is-invalid @enderror" name="classification" value="{{ old('classification') }}">
                                            @error('classification')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                        </div>

                                            <div class="form-group col-6">
                                                <label for="nb_voie" class=" form-control-label">NB voie<span class="text-danger">*</span></label>
                                                <input type="text" id="nb_voie" placeholder="NB voie" class="form-control @error('nb_voie') is-invalid @enderror" value="{{ old('nb_voie') }}"name="nb_voie">
                                                @error('nb_voie')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>                                
                                                @enderror
                                            </div>
                                    </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="sens" class=" form-control-label">sens <span class="text-danger">*</span></label>
                                    <input type="text" id="sens" placeholder="sens" class="form-control @error('sens') is-invalid @enderror" value="{{ old('sens') }}"name="sens" >
                                    @error('sens')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="carossable" class=" form-control-label">carossable <span class="text-danger">*</span></label>
                                    <input type="text" id="carossable" placeholder="carossable" class="form-control @error('carossable') is-invalid @enderror" value="{{ old('carossable') }}"name="carossable" >
                                    @error('carossable')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>
               <div class="form-row">

                            <div class="form-group col-6">
                                <label for="debut_droite" class=" form-control-label">debut droite<span class="text-danger">*</span></label>
                                <input type="text" id="debut_droite" placeholder="debut_droite" class="form-control @error('debut_droite') is-invalid @enderror" value="{{ old('debut_droite') }}"name="debut_droite" >
                                @error('debut_droite')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="debut_gauche" class=" form-control-label">debut gauche<span class="text-danger">*</span></label>
                                <input type="text" id="debut_gauche" placeholder="debut_gauche" class="form-control @error('debut_gauche') is-invalid @enderror" value="{{ old('debut_gauche') }}"name="debut_gauche" >
                                @error('debut_gauche')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
                        </div>

                   {{--          <div id="app2"><dr-agence nomdr="{{ old('nom_dr') }}" st="{{ old('structure') }}" org="{{ old('organisme') }}" nomdrerror="@error('nom_dr'){{ $message }}@enderror" sterror="@error('structure'){{ $message }}@enderror" orgerror="@error('organisme'){{ $message }}@enderror" /></div>
                            <div class="form-group col-6">
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
                            <div class="form-group col-6">
                                <label for="exampleFormControlFile1">geom_w </label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>--}}
                            
                            
                            
                           <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="fin_droite" class=" form-control-label">fin droite<span class="text-danger">*</span></label>
                                    <input type="text" id="fin_droite" placeholder="fin_droite" class="form-control  @error('fin_droite') is-invalid @enderror" name="fin_droite" value="{{ old('fin_droite') }}">
                                    @error('fin_droite')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                    @enderror
                                </div>
                           
                                    <div class="form-group col-6">
                                        <label for="fin_gauche" class=" form-control-label">fin gauche <span class="text-danger">*</span></label>
                                        <input type="text" id="fin_gauche" placeholder="fin_gauche" class="form-control  @error('fin_gauche') is-invalid @enderror" name="fin_gauche" value="{{ old('fin_gauche') }}">
                                        @error('fin_gauche')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                                </div> 
                                <div class="form-row">
       
                                    <div class="form-group col-6 ">
                                        <label for="code_com_dte" class=" form-control-label">code com droite<span class="text-danger">*</span></label>
                                        <input type="text" id="code_com_dte" placeholder="code com droite" class="form-control  @error('code_com_dte') is-invalid @enderror" name="code_com_dte" value="{{ old('code_com_dte') }}">
                                        @error('code_com_dte')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                               
                                <div class="form-group col-6">
                                    <label for="code_com_ghe" class=" form-control-label">code com gauche<span class="text-danger">*</span></label>
                                    <input type="text" id="code_com_ghe" placeholder="code com gauche" class="form-control @error('code_com_ghe') is-invalid @enderror" value="{{ old('code_com_ghe') }}"name="code_com_ghe" >
                                    @error('code_com_ghe')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-6">
                                    <label for="etat_route" class=" form-control-label">etat route<span class="text-danger">*</span></label>
                                    <input type="text" id="etat_route" placeholder="etat route" class="form-control @error('etat_route') is-invalid @enderror" value="{{ old('etat_route') }}"name="etat_route" >
                                    @error('etat_route')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="observation" class=" form-control-label">observation<span class="text-danger">*</span></label>
                                    <input type="text" id="observation" placeholder="observation" class="form-control @error('observation') is-invalid @enderror" value="{{ old('observation') }}"name="observation" >
                                    @error('observation')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>

                                <div class="form-group ">
                                    <label for="geom" class=" form-control-label">geom<span class="text-danger">*</span></label>
                                    <input type="text" id="geom" placeholder="geom" class="form-control @error('geom') is-invalid @enderror" value="{{ old('geom') }}"name="geom" >
                                    @error('geom')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <livewire:wilaya-commune>

                                {{-- <div class="form-group col-6">
                                    <label for="exampleFormControlSelect1">wilaya<span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_wilaya">
                                        <option value="" selected disabled>Séléctionner La wilaya</option>
                                          
                                    </select>     
                                    @error('fk_wilaya')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                                <div class="form-group col-6">
                                    <label for="exampleFormControlSelect1">diara<span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_diara') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_diara">
                                        <option value="" selected disabled>Séléctionner La wilaya</option>
                                          
                                    </select>     
                                    @error('fk_diara')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div>  --}}
                                
                    {{--              <div class="form-group col-6">
                                    <label for="password_confirmation" class=" form-control-label">Confirmation mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" id="password_confirmation" placeholder="Confirmation mot de passe" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                                </div>--}}
                                
                           
                            
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


 @include('decoupage.routiers.tblaffichageroutier') 


</div>
               
</div>
</div>
</div> 


@endsection