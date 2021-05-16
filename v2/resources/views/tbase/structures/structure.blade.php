@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">structures</a></li>
        <li class="active">Liste des structures</li>
    </ol>
@endsection

@section('content')
 


<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des structures</strong><small></small></div>
            @include('admin.messages')

            <div class="card-body card-block">
            


                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample"  >
                    Ajouter une structure
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('tbase.ajouter_structure') }}" method="post" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                    <div class="form-group col-6">
                                       <label for="code_ag" class=" form-control-label">Code agence<span class="text-danger">*</span></label>
                                       <input type="text" id="code_ag" placeholder="code" class="form-control @error('code_ag') is-invalid @enderror" name="code_ag" value="{{ old('code_ag') }}"autofocus>
                                       @error('code_ag')
                                           <span class="invalid-feedback" role="alert">
                                               {{ $message }}
                                           </span>                                
                                       @enderror
                                   </div> 
                                    <div class="form-group col-6">
                                        <label for="nom_ag" class=" form-control-label"> Agence<span class="text-danger">*</span></label>
                                        <input type="text" id="nom_ag" placeholder="nom_ag" class="form-control @error('nom_ag') is-invalid @enderror" name="nom_ag" value="{{ old('nom_ag') }}"autofocus>
                                        @error('nom_ag')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                            </div>

                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="Adresse" class=" form-control-label">Adresse<span class="text-danger">*</span></label>
                                            <input type="text" id="Adresse" placeholder="Adresse" class="form-control @error('Adresse') is-invalid @enderror" name="Adresse" value="{{ old('Adresse') }}"autofocus>
                                            @error('Adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                        </div>

                                            <div class="form-group col-6">
                                                <label for="Tel" class=" form-control-label">Tel<span class="text-danger">*</span></label>
                                                <input type="number" id="Tel" placeholder="0555555555" class="form-control @error('Tel') is-invalid @enderror" value="{{ old('Tel') }}"name="Tel"autofocus>
                                                @error('Tel')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>                                
                                                @enderror
                                            </div>
                                    </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="Fax" class=" form-control-label">Fax<span class="text-danger">*</span></label>
                                    <input type="number" id="Fax" placeholder="0555555555" class="form-control @error('Fax') is-invalid @enderror" value="{{ old('Fax') }}"name="Fax" autofocus>
                                    @error('Fax')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                </div>
                                {{-- <div class="form-group col-6">
                                    <label for="Telegraphe" class=" form-control-label">Telegraphe <span class="text-danger">*</span></label>
                                    <input type="text" id="Telegraphe" placeholder="Telegraphe" class="form-control @error('Telegraphe') is-invalid @enderror" value="{{ old('Telegraphe') }}"name="Telegraphe" autofocus >
                                    @error('Telegraphe')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div> --}}
                                <div class="form-group col-6">
                                    <label for="Email" class=" form-control-label">Email<span class="text-danger">*</span></label>
                                    <input type="Email" id="Email" placeholder="exemple@exemple.com" class="form-control @error('Email') is-invalid @enderror" value="{{ old('Email') }}"name="Email" autofocus>
                                    @error('Email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="RC" class=" form-control-label">RC<span class="text-danger">*</span></label>
                                <input type="text" id="RC" placeholder="RC" class="form-control @error('RC') is-invalid @enderror" value="{{ old('RC') }}"name="RC" autofocus>
                                @error('RC')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
                
                           <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="IA" class=" form-control-label">IA<span class="text-danger">*</span></label>
                                    <input type="text" id="IA" placeholder="IA" class="form-control  @error('IA') is-invalid @enderror" name="IA"value="{{ old('IA') }}" autofocus>
                                    @error('IA')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                    @enderror
                                </div>
                           
                                    <div class="form-group col-6">
                                        <label for="NIF" class=" form-control-label">NIF <span class="text-danger">*</span></label>
                                        <input type="text" id="NIF" placeholder="NIF" class="form-control  @error('NIF') is-invalid @enderror" value="{{ old('NIF') }}" name="NIF" autofocus>
                                        @error('NIF')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                                </div> 
                                
                                    <div class="form-group ">
                                        <label for="Compte_bancaire" class=" form-control-label">Compte bancaire<span class="text-danger">*</span></label>
                                        <input type="text" id="Compte_bancaire" placeholder="Compte bancaire" class="form-control  @error('Compte_bancaire') is-invalid @enderror" name="Compte_bancaire" value="{{ old('Compte_bancaire') }}" autofocus>
                                        @error('Compte_bancaire')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                               
                                <div class="form-group">
                                    <label for="NSS" class=" form-control-label">NSS<span class="text-danger">*</span></label>
                                    <input type="text" id="NSS" placeholder="NSS" class="form-control @error('NSS') is-invalid @enderror" value="{{ old('NSS') }}"name="NSS" autofocus>
                                    @error('NSS')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="abreger" class=" form-control-label">abreger<span class="text-danger">*</span></label>
                                    <input type="text" id="abreger" placeholder="abreger" class="form-control @error('abreger') is-invalid @enderror" value="{{ old('abreger') }}"name="abreger" autofocus>
                                    @error('abreger')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="Sommeil" class=" form-control-label">Sommeil<span class="text-danger">*</span></label>
                                    <input type="number" id="Sommeil" placeholder="Sommeil" class="form-control @error('Sommeil') is-invalid @enderror" value="{{ old('Sommeil') }}"name="Sommeil"autofocus >
                                    @error('Sommeil')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="NumeroRef" class=" form-control-label">Numero Ref<span class="text-danger">*</span></label>
                                    <input type="number" id="NumeroRef" placeholder="NumeroRef" class="form-control @error('NumeroRef') is-invalid @enderror" value="{{ old('NumeroRef') }}"name="NumeroRef" autofocus>
                                    @error('NumeroRef')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="LieuSortant" class=" form-control-label">Lieu Sortant<span class="text-danger">*</span></label>
                                    <input type="text" id="LieuSortant" placeholder="LieuSortant" class="form-control @error('LieuSortant') is-invalid @enderror" value="{{ old('LieuSortant') }}"name="LieuSortant" autofocus>
                                    @error('LieuSortant')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="DateCourrier" class=" form-control-label">Date Courrier<span class="text-danger">*</span></label>
                                    <input type="date" id="DateCourrier" placeholder="DateCourrier" class="form-control @error('DateCourrier') is-invalid @enderror" value="{{ old('DateCourrier') }}"name="DateCourrier" autofocus>
                                    @error('DateCourrier')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="NumeroSequentiel" class=" form-control-label">Numero Sequentiel<span class="text-danger">*</span></label>
                                    <input type="number" id="NumeroSequentiel" placeholder="NumeroSequentiel" class="form-control @error('NumeroSequentiel') is-invalid @enderror" value="{{ old('NumeroSequentiel') }}"name="NumeroSequentiel" autofocus>
                                    @error('NumeroSequentiel')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="VisibleGCPRO" class=" form-control-label">Visible GCPRO <span class="text-danger">*</span></label>
                                    <input type="number" id="VisibleGCPRO" placeholder="VisibleGCPRO" class="form-control @error('VisibleGCPRO') is-invalid @enderror" value="{{ old('VisibleGCPRO') }}"name="VisibleGCPRO" autofocus>
                                    @error('VisibleGCPRO')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>

                            <div class="form-group">
                                <label for="GuichetUnique" class=" form-control-label">Guichet Unique<span class="text-danger">*</span></label>
                                <input type="number" id="GuichetUnique" placeholder="GuichetUnique" class="form-control @error('GuichetUnique') is-invalid @enderror" value="{{ old('GuichetUnique') }}"name="GuichetUnique" autofocus>
                                @error('GuichetUnique')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="fk_wilaya" class=" form-control-label">fk_wilaya<span class="text-danger">*</span></label>
                                <input type="text" id="fk_wilaya" placeholder="fk_wilaya" class="form-control @error('fk_wilaya') is-invalid @enderror" value="{{ old('fk_wilaya') }}"name="fk_wilaya" >
                                @error('fk_wilaya')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
                
                           <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="fk_commune" class=" form-control-label">fk_commune<span class="text-danger">*</span></label>
                                    <input type="text" id="fk_commune" placeholder="fk_commune" class="form-control  @error('fk_commune') is-invalid @enderror" name="fk_commune" value="{{ old('fk_commune') }}">
                                    @error('fk_commune')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                    @enderror
                                </div> --}}
                                <livewire:wilaya-commune :wilaya="old('fk_wilaya')" :commune="old('fk_commune')"> 

                           
                                    {{-- <div class="form-group">
                                        <label for="DateModifConsolid" class=" form-control-label">Date Modif Consolid <span class="text-danger">*</span></label>
                                        <input type="date" id="DateModifConsolid" placeholder="DateModifConsolid" class="form-control  @error('DateModifConsolid') is-invalid @enderror" name="DateModifConsolid" value="{{ old('DateModifConsolid') }}"autofocus>
                                        @error('DateModifConsolid')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div> --}}
                                {{-- </div>  --}}
                                
                                    {{-- <div class="form-group ">
                                        <label for="DateModif" class=" form-control-label">Date Modif<span class="text-danger">*</span></label>
                                        <input type="date" id="DateModif" placeholder="DateModif" class="form-control  @error('DateModif') is-invalid @enderror" name="DateModif" value="{{ old('DateModif') }}"autofocus>
                                        @error('DateModif')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div> --}}
                               
                                {{-- <div class="form-group">
                                    <label for="Nom_DR" class=" form-control-label">Nom_DR<span class="text-danger">*</span></label>
                                    <input type="text" id="Nom_DR" placeholder="Nom_DR" class="form-control @error('Nom_DR') is-invalid @enderror" value="{{ old('Nom_DR') }}"name="Nom_DR" >
                                    @error('Nom_DR')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"> Direction Régionale<span class="text-danger">*</span></label>
                                    <select class="form-control @error('Nom_DR') is-invalid @enderror" id="exampleFormControlSelect1" name="Nom_DR"  >
                                        @if ( old('Nom_DR') )
                                        <option value="{{ old('Nom_DR') }}" selected >{{ old('Nom_DR') }}</option>
                                        @else
                                        <option value=""  disabled>Séléctionner organisme</option>
                                        @endif
                                        @foreach ($directions as $direction)
                                        <option value="{{ $direction->nom }}"> {{ $direction->nom }}</option>
                                      @endforeach
                                    </select>     
                                    @error('Nom_DR')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                                
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



                    @include('tbase.structures.tblaffichagestructure') 
                   
                   











            </div>
           
        </div>
    </div>
</div>  
@endsection




