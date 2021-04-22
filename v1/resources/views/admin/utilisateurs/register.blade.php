@extends('admin.master')
@section('ol-title')    
    <h1>S'inscrire</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Utilisateurs</a></li>
        <li class="active">S'inscrire</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>S'inscrire</strong><small> Formulaire</small></div>
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
                        <input type="email" id="matricule" placeholder="Email" class="form-control" name="email" >
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
                        <button id="payment-button" type="button" class="btn btn-lg btn-success btn-block">
                            <i class="fa fa-save fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Enregister</span>
                            {{-- <span id="payment-button-sending" >Enregistrement…</span> --}}
                        </button>
                    </div>
                </form>    
                </div>
            </div>
        </div>
    </div>
@endsection