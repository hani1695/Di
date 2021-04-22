@extends('admin.master')


@section('content')
    <div class="row" style="margin-bottom: 100px;">
        
        <div class="col-lg">
            <div class="card">
              @foreach ($errors->all() as $error)                
                <div class="card-header" id="rem">
                  <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" onclick="rem()"><span aria-hidden="true">×</span><span
                              class="sr-only">Close</span></button>
                      <i class="fas fa-exclamation-circle"></i>   {{ $error }}
                  </div>
              </div>
              @endforeach 
                <div class="card-body card-block">
                    @include('admin.styles')
                  

<div class="rela-block containers">
    <div class="rela-block profile-card">
        <img src="{{ empty(auth()->user()->image) ? asset('images/admin.jpg') : asset('storage/'.auth()->user()->image) }}" class="profile-pic" id="profile_pic"/>
        <div class="rela-block profile-name-containers">
            <div class="rela-block user-name" id="user_name">{{ auth()->user()->nom.' '.auth()->user()->prenom }}</div>
            <div class="rela-block user-desc" id="user_description">{{ Auth::user()->fonction }}</div>
        </div>
        <div class="rela-block profile-card-stats">
            <div class="floated profile-stat " id="num_works">Profil<br>{{ Auth::user()->profile }}</div>
            <div class="floated profile-stat " id="num_followers">Matricule<br>{{ Auth::user()->matricule }}</div>
            <div class="floated profile-stat " id="num_following">Organisme<br>{{ Auth::user()->organisme }}</div>
        </div>
    </div>
    
</div>
<div class="rela-block footer">
    
    <button class="btn btn-warning mb-2 text-center" type="button"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <i class="fas fa-cog"></i> modifier le mot de passe
    </button>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <form action="{{ route('utilisateur.passchangeer') }}" method="post">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="old_password">Mot de passe actuel <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="old_password" name="current_password">
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="password">Nouveau mot de passe <span class="text-danger">*</span></label>
                          <input type="password" class="form-control" id="password" name="new_password">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="password_confirmation">Confirmation mot de passe <span class="text-danger">*</span></label>
                          <input type="password" class="form-control" id="password_confirmation" name="new_confirm_password">
                        </div>
                      </div>
                </div>
            </div>
              @csrf
            <button class="btn btn-success">Modifier</button>
          </form>
        </div>
      </div>
</div>
                    
                </div>

            </div>
        </div>
    </div>


@endsection
