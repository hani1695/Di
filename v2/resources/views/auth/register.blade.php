@extends('admin.master')
@section('ol-title')    
    <h1>gestions</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li>Comptes</li>
        <li class="active">Ajouter un utilisateur</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Ajouter un utilisateur</strong><small> Formulaire</small></div>
                <div class="card-body card-block">
                <form method="POST" action="{{ route('register') }}">    
                    <div class="form-group">
                        <label for="matricule" class=" form-control-label">Matricule <span class="text-danger">*</span></label>
                        <input type="text" id="matricule" placeholder="Matricule" class="form-control" name="matricule" autofocus>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="nom" class=" form-control-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" id="nom" placeholder="Nom" class="form-control" name="nom">
                        </div>
                        <div class="form-group col-6">
                            <label for="prenom" class=" form-control-label">Prenom <span class="text-danger">*</span></label>
                            <input type="text" id="prenom" placeholder="Prenom" class="form-control" name="prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class=" form-control-label">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" placeholder="Email" class="form-control" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="fonction" class=" form-control-label">Fonction <span class="text-danger">*</span></label>
                        <input type="text" id="fonction" placeholder="Fonction" class="form-control" name="fonction" >
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="password" class=" form-control-label">Mot de passe <span class="text-danger">*</span></label>
                            <input type="password" id="password" placeholder="Mot de passe" class="form-control" name="password" autocomplete="new-password">
                        </div>
                        <div class="form-group col-6">
                            <label for="password_confirmation" class=" form-control-label">Confirmation mot de passe <span class="text-danger">*</span></label>
                            <input type="password" id="password_confirmation" placeholder="Confirmation mot de passe" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
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
        </div>
    </div>
@endsection

































{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fonction" class="col-md-4 col-form-label text-md-right">{{ __('fonction') }}</label>

                            <div class="col-md-6">
                                <input id="fonction" type="text" class="form-control @error('fonction') is-invalid @enderror" name="fonction" value="{{ old('fonction') }}" required autocomplete="fonction" autofocus>

                                @error('fonction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
