@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('zone.index')}}">les types des zones</a></li>
        <li class="active">Modifier un type des zones</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Les types des zones - Modification</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('zone.update',$zone_enr->id_type_z)}}" class="container">
   @csrf
   @method('PUT')

   <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code de type </span>
        </div>
        <input type="text"  name="id_type_z" value="{{$zone_enr->id_type_z}}" id="id_type_z" class="form-control {{$errors->has('id_type_z')? 'is-invalid' :''}}" placeholder="id_type_z" aria-label="id_type_z" aria-describedby="basic-addon1" readonly>
            @error('id_type_z')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">descreption</span>
        </div>
        <input type="text"  name="descreption_t_z" value="{{$zone_enr->descreption_t_z}}" id="descreption_t_z" class="form-control {{$errors->has('descreption_t_z')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="descreption_t_z" aria-describedby="basic-addon1">
            @error('descreption_t_z')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
   <button type="submit" class="btn btn-info boutonajgout" > Enregistrer la modification</button>

</form>
<br><br>

   {{-- <form  action="{{route('zone.edit',$zone_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('listes_predefinies.type_zones_des_voies.tblaffichage_type_zones_des_voie') 

           </div>
           
        </div>
    </div>
</div>  




@endsection