@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('tbase.structure')}}">structures</a></li>
        {{-- {{route('structure.index')}} --}}
        <li class="active">Modifier la structure</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des structures - Modification</strong><small>Formulaire</small></div>
            <div class="card-body card-block">
                 
                {{-- {{ route('tbase.modifier_structure') }} --}}
                {{-- <form action="{{ route('tbase.modifier_structure',$structure_enr->id) }}" method="post" enctype="multipart/form-data"> --}}
                            
                    <div class="form-row">
                            <div class="form-group col-6">
                               <label for="code_ag" class=" form-control-label">code agence<span class="text-danger">*</span></label>
                               <input type="text" id="code_ag" placeholder="code_ag" class="form-control @error('code_ag') is-invalid @enderror" name="code_ag" readonly value="{{ $structure_enr->code_ag }}"autofocus>
                               @error('code_ag')
                                   <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>                                
                               @enderror
                           </div> 
                            <div class="form-group col-6">
                                <label for="nom_ag" class=" form-control-label">nom agence<span class="text-danger">*</span></label>
                                <input type="text" id="nom_ag" placeholder="nom_ag" class="form-control @error('nom_ag') is-invalid @enderror" name="nom_ag" readonly value="{{ $structure_enr->nom_ag }}">
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
                                    <input type="text" id="Adresse" placeholder="Adresse" class="form-control @error('Adresse') is-invalid @enderror" name="Adresse" readonly value="{{ $structure_enr->Adresse }}">
                                    @error('Adresse')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>

                                    <div class="form-group col-6">
                                        <label for="Tel" class=" form-control-label">Tel<span class="text-danger">*</span></label>
                                        <input type="number" id="Tel" placeholder="Tel" class="form-control @error('Tel') is-invalid @enderror" readonly value="{{$structure_enr->Tel }}"name="Tel">
                                        @error('Tel')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                            </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="Fax" class=" form-control-label">Fax <span class="text-danger">*</span></label>
                            <input type="number" id="Fax" placeholder="Fax" class="form-control @error('Fax') is-invalid @enderror" readonly value="{{ $structure_enr->Fax }}"name="Fax" >
                            @error('Fax')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="Telegraphe" class=" form-control-label">Telegraphe <span class="text-danger">*</span></label>
                            <input type="text" id="Telegraphe" placeholder="Telegraphe" class="form-control @error('Telegraphe') is-invalid @enderror" readonly value="{{ $structure_enr->Telegraphe }}"name="Telegraphe" >
                            @error('Telegraphe')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                    </div>
          <div class="form-row">

                    <div class="form-group col-6">
                        <label for="Email" class=" form-control-label">Email<span class="text-danger">*</span></label>
                        <input type="Email" id="Email" placeholder="Email" class="form-control @error('Email') is-invalid @enderror" readonly value="{{ $structure_enr->Email }}"name="Email" >
                        @error('Email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="RC" class=" form-control-label">RC<span class="text-danger">*</span></label>
                        <input type="text" id="RC" placeholder="RC" class="form-control @error('RC') is-invalid @enderror" readonly value="{{ $structure_enr->RC }}"name="RC" >
                        @error('RC')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div>
            </div>

                   <div class="form-row">
                        <div class="form-group col-6">
                            <label for="IA" class=" form-control-label">IA<span class="text-danger">*</span></label>
                            <input type="text" id="IA" placeholder="IA" class="form-control  @error('IA') is-invalid @enderror" readonly value="{{ $structure_enr->IA }}" name="IA">
                            @error('IA')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                            @enderror
                        </div>
                   
                            <div class="form-group col-6">
                                <label for="NIF" class=" form-control-label">NIF <span class="text-danger">*</span></label>
                                <input type="text" id="NIF" placeholder="NIF" class="form-control  @error('NIF') is-invalid @enderror" readonly value="{{ $structure_enr->NIF }}" name="NIF">
                                @error('NIF')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                                @enderror
                            </div>
                        </div> 
              <div class="form-row">
 
                            <div class="form-group col-6">
                                <label for="Compte_bancaire" class=" form-control-label">Compte bancaire<span class="text-danger">*</span></label>
                                <input type="text" id="Compte_bancaire" placeholder="Compte_bancaire" class="form-control  @error('Compte_bancaire') is-invalid @enderror" readonly value="{{ $structure_enr->Compte_bancaire }}" name="Compte_bancaire">
                                @error('Compte_bancaire')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                                @enderror
                            </div>
                       
                        <div class="form-group col-6">
                            <label for="NSS" class=" form-control-label">NSS<span class="text-danger">*</span></label>
                            <input type="text" id="NSS" placeholder="NSS" class="form-control @error('NSS') is-invalid @enderror" readonly value="{{ $structure_enr->NSS }}" name="NSS" >
                            @error('NSS')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-row "> --}}

                        <div class="form-group ">
                            <label for="abreger" class=" form-control-label">abreger<span class="text-danger">*</span></label>
                            <input type="text" id="abreger" placeholder="abreger" class="form-control @error('abreger') is-invalid @enderror" readonly value="{{ $structure_enr->abreger }}"name="abreger" >
                            @error('abreger')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                        {{-- <div class="form-group col-6">
                            <label for="Sommeil" class=" form-control-label">Sommeil<span class="text-danger">*</span></label>
                            <input type="text" id="Sommeil" placeholder="Sommeil" class="form-control @error('Sommeil') is-invalid @enderror" readonly value="{{ $structure_enr->Sommeil }}"name="Sommeil" >
                            @error('Sommeil')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="NumeroRef" class=" form-control-label">Numero Ref<span class="text-danger">*</span></label>
                            <input type="number" id="NumeroRef" placeholder="NumeroRef" class="form-control @error('NumeroRef') is-invalid @enderror" readonly value="{{ $structure_enr->NumeroRef }}" name="NumeroRef" >
                            @error('NumeroRef')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="LieuSortant" class=" form-control-label">Lieu Sortant<span class="text-danger">*</span></label>
                            <input type="text" id="LieuSortant" placeholder="LieuSortant" class="form-control @error('LieuSortant') is-invalid @enderror" readonly value="{{ $structure_enr->LieuSortant }}"name="LieuSortant" >
                            @error('LieuSortant')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="DateCourrier" class=" form-control-label">Date Courrier<span class="text-danger">*</span></label>
                            <input type="date" id="DateCourrier" placeholder="DateCourrier" class="form-control @error('DateCourrier') is-invalid @enderror" readonly value="{{ $structure_enr->DateCourrier }}"name="DateCourrier" >
                            @error('DateCourrier')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="NumeroSequentiel" class=" form-control-label">Numero Sequentiel<span class="text-danger">*</span></label>
                            <input type="number" id="NumeroSequentiel" placeholder="NumeroSequentiel" class="form-control @error('NumeroSequentiel') is-invalid @enderror" readonly value="{{ $structure_enr->NumeroSequentiel }}"name="NumeroSequentiel" >
                            @error('NumeroSequentiel')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                    </div>

                 <div class="form-row">

                        <div class="form-group col-6">
                            <label for="VisibleGCPRO" class=" form-control-label">Visible GCPRO <span class="text-danger">*</span></label>
                            <input type="text" id="VisibleGCPRO" placeholder="VisibleGCPRO" class="form-control @error('VisibleGCPRO') is-invalid @enderror" readonly value="{{ $structure_enr->VisibleGCPRO }}"name="VisibleGCPRO" >
                            @error('VisibleGCPRO')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                    <div class="form-group col-6">
                        <label for="GuichetUnique" class=" form-control-label">Guichet Unique<span class="text-danger">*</span></label>
                        <input type="text" id="GuichetUnique" placeholder="GuichetUnique" class="form-control @error('GuichetUnique') is-invalid @enderror" readonly value="{{ $structure_enr->GuichetUnique }}"name="GuichetUnique" >
                        @error('GuichetUnique')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div>
                </div> --}}
                <div class="form-row">

                    <div class="form-group col-6">
                        <label for="fk_wilaya" class=" form-control-label">wilaya agence<span class="text-danger">*</span></label>
                        <input type="text" id="fk_wilaya" placeholder="fk_wilaya" class="form-control @error('fk_wilaya') is-invalid @enderror" readonly value="{{ $structure_enr->nom_w }}"name="fk_wilaya" >
                        @error('fk_wilaya')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div>
        
                        <div class="form-group col-6">
                            <label for="fk_commune" class=" form-control-label">commune agence<span class="text-danger">*</span></label>
                            <input type="text" id="fk_commune" placeholder="fk_commune" class="form-control  @error('fk_commune') is-invalid @enderror" readonly value="{{ $structure_enr->nom_c }}" name="fk_commune">
                            @error('fk_commune')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                            @enderror
                        </div>
                </div>

                        {{-- <livewire:wilaya-commune> --}}
                     <div class="form-row">

                            {{-- <div class="form-group col-6">
                                <label for="DateModifConsolid" class=" form-control-label">Date Modif Consolid <span class="text-danger">*</span></label>
                                <input type="date" id="DateModifConsolid" placeholder="DateModifConsolid" class="form-control  @error('DateModifConsolid') is-invalid @enderror" readonly value="{{ $structure_enr->DateModifConsolid }}" name="DateModifConsolid">
                                @error('DateModifConsolid')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                                @enderror
                            </div> --}}
                        
                            <div class="form-group col-6">
                                <label for="DateModif" class=" form-control-label">Date Modif<span class="text-danger">*</span></label>
                                <input type="date" id="DateModif" placeholder="DateModif" class="form-control  @error('DateModif') is-invalid @enderror" readonly value="{{ $structure_enr->DateModif }}"  name="DateModif">
                                @error('DateModif')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                                @enderror
                            </div>


                          <div class="form-group col-6">
                                    <label for="exampleFormControlSelect1"> Direction Régionale<span class="text-danger">*</span></label>
                                    <input type="texte" id="Nom_DR" placeholder="Nom_DR" class="form-control  @error('Nom_DR') is-invalid @enderror" readonly value="{{ $structure_enr->Nom_DR }}"  name="Nom_DR">
                                @error('Nom_DR')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                                @enderror
                                    
                                                         
                            </div> 
                        </div>
                    </div>
                        
                    @csrf                    
                    {{-- <div   class="form-group ">
                        <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                            <i class="fa fa-save fa-lg "></i>
                            <span id="payment-button-amount">Enregistrer</span>                            
                        </button>
                    </div> --}}
                {{-- </form> --}}



    
    

           </div>
           <br>
        <br>
        {{-- @include('tbase.structures.tblaffichagestructure')  --}}
        </div>
    </div>
</div>





@endsection