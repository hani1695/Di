@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('utilisateur.index')}}">Utilisateurs</a></li>
        <li class="active">Modifier un utilisateur</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des utilisateurs - Modification</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                 

                <div class="card-header mb-5">
                    @if ( $privilege->insertion)                   
                    <div class="collapse show" id="collapseExample">
                        
                            <form action="{{ route('utilisateur.update',$utilisateur_enr->id) }}" method="post" enctype="multipart/form-data"> @method('PATCH')
                                <div class="form-group">
                                    <label for="matricule" class=" form-control-label">Matricule <span class="text-danger">*</span></label>
                                    <input type="text" id="matricule" placeholder="Matricule" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ $utilisateur_enr->matricule }}">
                                    @error('matricule')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="nom" class=" form-control-label">Nom <span class="text-danger">*</span></label>
                                        <input type="text" id="nom" placeholder="Nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $utilisateur_enr->nom }}">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="prenom" class=" form-control-label">Prenom <span class="text-danger">*</span></label>
                                        <input type="text" id="prenom" placeholder="Prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ $utilisateur_enr->prenom }}"name="prenom">
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class=" form-control-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ $utilisateur_enr->email }}"name="email" >
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fonction" class=" form-control-label">Fonction <span class="text-danger">*</span></label>
                                    <input type="text" id="fonction" placeholder="Fonction" class="form-control @error('fonction') is-invalid @enderror" value="{{ $utilisateur_enr->fonction }}"name="fonction" >
                                    @error('fonction')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                <div id="app2"><dr-agence nomdr="{{ $utilisateur_enr->nom_dr }}" st="{{ $utilisateur_enr->structure }}" org="{{ $utilisateur_enr->organisme }}" nomdrerror="@error('nom_dr'){{ $message }}@enderror" sterror="@error('structure'){{ $message }}@enderror" orgerror="@error('organisme'){{ $message }}@enderror" /></div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Profil <span class="text-danger">*</span></label>
                                    <select class="form-control @error('profile') is-invalid @enderror" id="exampleFormControlSelect1" name="profile">
                                        <option value="" disabled>Séléctionner Le Profil</option>
                                      @foreach ($profiles as $data)
                                        <option value="{{ $data->code }}" {{ $data->code == $utilisateur_enr->profile ? 'selected': '' }}>{{ $data->limitation.'-'.$data->code.'-'.$data->libelle }}</option>  
                                                                       
                                      @endforeach            
                                    </select>     
                                    @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-2 mr-3">
                                        <label for="exampleFormControlF">Image actuelle</label>
                                        <button class="btn btn-info form-control" type="button" id="exampleFormControlF" {{ empty($utilisateur_enr->image) ? 'disabled' : '' }} data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-image"></i></button>
                                    </div>
                                    <div class="form-group col6">
                                        <label for="exampleFormControlFile1" class="mt-1">Image de profil </label>                                    
                                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="password" class=" form-control-label">Mot de passe </label>
                                        <input type="password" id="password" placeholder="Mot de passe" class="form-control  @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="password_confirmation" class=" form-control-label">Confirmation mot de passe </label>
                                        <input type="password" id="password_confirmation" placeholder="Confirmation mot de passe" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                    </div>
                                    
                                </div>
                                
                                @csrf                    
                                <div>
                                <div>
                                <div>
                                <div>
                                    <button id="payment-button mb-4" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                                        <i class="fa fa-save fa-lg "></i>
                                        <span id="payment-button-amount">Enregistrer</span>                            
                                    </button>
                                </div>
                            </form>
                       
                      </div>
                    @endif
                </div>

                <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <img src="{{ asset('storage/'.$utilisateur_enr->image) }}" alt="">
                      </div>
                    </div>
                  </div>
    
    

           </div>
           
        </div>
    </div>
    @include('utilisateurs.tblaffichageuser') 
</div>  




@endsection
