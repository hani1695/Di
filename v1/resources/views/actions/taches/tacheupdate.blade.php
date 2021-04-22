@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('tache.index')}}">les taches</a></li>
        <li class="active">Modifier une tache</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>les taches - Modification</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('tache.update',$tache_enr->tache)}}" class="container">
   @csrf
   @method('PUT')

   <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">tache</span>
        </div>
        <input type="text"  name="tache" value="{{$tache_enr->tache}}" id="tache" class="form-control {{$errors->has('tache')? 'is-invalid' :''}}" placeholder="tache" aria-label="tache" aria-describedby="basic-addon1" readonly>
            @error('tache')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">description</span>
        </div>
        <input type="text"  name="description" value="{{$tache_enr->description}}" id="description" class="form-control {{$errors->has('description')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="description" aria-describedby="basic-addon1">
            @error('description')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
   <button type="submit" class="btn btn-info boutonajgout" > Enregistrer la modification</button>

</form>
<br><br>

   {{-- <form  action="{{route('voie.edit',$tache_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="voierecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('actions.taches.tblaffichagetache') 

           </div>
           
        </div>
    </div>
</div>  




@endsection