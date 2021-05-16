@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('status_juridique.index')}}">listes prédéfinies</a></li>
        <li class="active">Modifier   status juridique</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Status juridique - Modification</strong><small> </small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('status_juridique.update',$status_juridique_enr->id_statu_j)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Code status juridique</span>
        </div>
        <input type="text"  name="id_statu_j" value="{{$status_juridique_enr->id_statu_j}}" id="id_statu_j" class="form-control {{$errors->has('id_statu_j')? 'is-invalid' :''}}" placeholder="id_statu_j" aria-label="id_statu_j" aria-describedby="basic-addon1" readonly>
            @error('id_statu_j')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Designation</span>
        </div>
        <input type="text"  name="descreption_s" value="{{$status_juridique_enr->descreption_s}}" id="descreption_s" class="form-control {{$errors->has('descreption_s')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="descreption_s" aria-describedby="basic-addon1">
            @error('descreption_s')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
    <div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
            <i class="fa fa-save fa-lg "></i>
            <span id="payment-button-amount">Enregistrer</span>                            
        </button>
    </div>
</form>
<br><br>

   {{-- <form  action="{{route('status_juridique.edit',$status_juridique_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('listes_predefinies.status_juridiques.tblaffichage_status_juridique') 

           </div>
           
        </div>
    </div>
</div>  




@endsection