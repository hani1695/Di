@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('usage.index')}}">les types d'usages</a></li>
        <li class="active">Modifier un type d'usage</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des types d'usages - Modification</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('usage.update',$usage_enr->id_usage)}}" class="container">
   @csrf
   @method('PUT')

   <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code usage</span>
        </div>
        <input type="text"  name="id_usage" value="{{$usage_enr->id_usage}}" id="id_usage" class="form-control {{$errors->has('id_usage')? 'is-invalid' :''}}" placeholder="id_usage" aria-label="id_usage" aria-describedby="basic-addon1" readonly>
            @error('id_usage')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">descreption</span>
        </div>
        <input type="text"  name="descreption_u" value="{{$usage_enr->descreption_u}}" id="descreption_u" class="form-control {{$errors->has('descreption_u')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="descreption_u" aria-describedby="basic-addon1">
            @error('descreption_u')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
   <button type="submit" class="btn btn-info boutonajgout" > Enregistrer la modification</button>

</form>
<br><br>

   {{-- <form  action="{{route('usage.edit',$usage_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('listes_predefinies.type_usages.tblaffichage_type_usage') 

           </div>
           
        </div>
    </div>
</div>  




@endsection