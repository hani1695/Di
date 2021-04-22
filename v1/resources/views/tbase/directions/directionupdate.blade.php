@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">directions</a></li>
        {{-- {{route('direction.index')}} --}}
        <li class="active">Modifier la direction</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">

    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des Directions</strong><small>formulaire</small></div>
            <div class="card-header">
                {{-- @if ($privilege->insertion)
                    <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        Modifier la direction
                    </a> --}}
                    {{-- <div class="collapse" id="collapseExample"> --}}
                        <div class="card card-body">
                 
                {{-- {{ route('tbase.modifier_direction') }} --}}
                <form action="{{ route('tbase.modifier_direction',$direction_enr->id)}}" method="post" enctype="multipart/form-data" >
                    {{-- <div class="form-group">
                        <label for="nom" class=" form-control-label">Nom <span
                                class="text-danger">*</span></label>
                        <input type="text" id="nom" placeholder="Nom du l'direction" class="form-control"
                            name="nom" autofocus>
                    </div> --}}
                    <div class="form-group ">
                        <label for="nom" class=" form-control-label">Nom<span class="text-danger">*</span></label>
                        <input type="text" id="nom" placeholder="nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $direction_enr->nom }}""autofocus>
                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div> 

                    {{-- <div class="form-group">
                        <label for="logo">Logo du l'direction </label><span class="text-danger">*</span>
                        <input type="file" class="form-control-file" id="logo">
                    </div> --}}
                    <div class="form-group ">
                        <label for="logo" class=" form-control-label">Logo du l'direction<span class="text-danger">*</span></label>
                        <input type="file" id="logo" placeholder="logo" class="form-control-file @error('logo') is-invalid @enderror" name="logo"  accept=".image/jpeg,image/png" value="{{ $direction_enr->logo }}"autofocus >
                        {{-- <input type="file" value="" accept=".image/jpeg,image/png" name="logo" class="form-control"  > --}}
                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div> 
                    {{-- <div class="form-group">
                        <label for="email" class=" form-control-label">Email <span
                                class="text-danger">*</span></label>
                        <input type="email" id="email" placeholder="Email du l'direction"
                            class="form-control" name="email">
                    </div> --}}
                    <div class="form-group ">
                        <label for="email" class=" form-control-label">Email<span class="text-danger">*</span></label>
                        <input type="email" id="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $direction_enr->email }}"autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div> 
                    <div class="form-group ">
                        <label for="phone" class=" form-control-label">phone<span class="text-danger">*</span></label>
                        <input type="phone" id="phone" placeholder="ex:0555 5555 55" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $direction_enr->phone }}"autofocus>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div> 
                    
                    {{-- <div class="form-group">
                        <label for="description" class=" form-control-label">Region <span
                                class="text-danger">*</span></label>
                        <input type="text" id="nom_reg" placeholder="Nom de la Region du l'direction"
                            class="form-control" name="nom_reg" autofocus>
                    </div> --}}
                    <div class="form-group ">
                        <label for="nom_reg" class=" form-control-label">Region<span class="text-danger">*</span></label>
                        <input type="text" id="nom_reg" placeholder="nom_reg" class="form-control @error('nom_reg') is-invalid @enderror" name="nom_reg" value="{{ $direction_enr->nom_reg }}"autofocus>
                        @error('nom_reg')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">nom de l'organisme<span class="text-danger">*</span></label>
                        <select class="form-control @error('Nom_Org') is-invalid @enderror" id="exampleFormControlSelect1" name="Nom_Org"  >
                            <option value="" selected disabled>Séléctionner organisme</option>
                            @foreach ($organismes as $organisme)
                            <option value="{{ $organisme->id }}"> {{ $organisme->nom }}</option>
                          @endforeach
                        </select>     
                        @error('Nom_Org')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>                                
                        @enderror
                                             
                    </div> 
                    
                    <livewire:wilaya-commune>

                    @csrf
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block"
                            onclick="enr(this)">
                            <i class="fa fa-save fa-lg "></i>
                            <span id="payment-button-amount">Enregistrer</span>
                        </button>
                    </div>
                </form>



    
    
            </div>
        </div>
    {{-- @endif --}}
</div>
@include('tbase.directions.tblaffichagedirection') 

{{-- </div> --}}
</div>
</div>


{{-- @include('tbase.directions.tblaffichagedirection')  --}}





@endsection