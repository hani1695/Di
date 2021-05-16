@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('district.index')}}">Adressages</a></li>
        <li class="active">Modifier un district</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des districts - Modification</strong><small> </small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('district.update',$district_enr->id_district)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code district</span>
        </div>
        <input type="text"  name="id_district" value="{{$district_enr->id_district}}" id="id_district" class="form-control {{$errors->has('id_district')? 'is-invalid' :''}}" placeholder="id_district" aria-label="id_district" aria-describedby="basic-addon1" readonly>
            @error('id_district')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1"> District<span class="text-danger">*</span></span>
        </div>
        <input type="text"  name="num_district" value="{{$district_enr->num_district}}" id="num_district" class="form-control {{$errors->has('num_district')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="num_district" aria-describedby="basic-addon1">
            @error('num_district')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Observation</span>
        </div>
        <input type="text"  name="observation" value="{{$district_enr->observation}}" id="observation" class="form-control {{$errors->has('observation')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="observation" aria-describedby="basic-addon1">
            @error('observation')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Direction</span>
        </div>
        <input type="text"  name="nomdrread" value="{{$district_enr->nom_dr}}" id="nomdrread" class="form-control {{$errors->has('nomdrread')? 'is-invalid' :''}}" placeholder="exemple: direction" aria-label="nomdrread" aria-describedby="basic-addon1" readonly>
            @error('nomdrread')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>--}}

    {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">geom</span>
        </div>
        <input type="text"  name="geom" value="{{$district_enr->geom}}" id="geom" class="form-control {{$errors->has('geom')? 'is-invalid' :''}}" placeholder="exemple: agence x" aria-label="geom" aria-describedby="basic-addon1" >
            @error('geom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}


    {{-- <livewire:listebagence> --}}

    
    {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">commune</span>
        </div>
        <select class="form-control @error('fk_commune') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_commune">
            <option value="" selected disabled>Séléctionner commune</option>
            @foreach ($communes as $commune)
            <option value="{{ $commune->code_c }}"> {{ $commune->nom_c }}</option>
          @endforeach
        </select>     
        @error('fk_commune')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror
    </div> --}}
    <livewire:wilaya-commune :wilaya="$district_enr->fk_wilaya" :commune="$district_enr->fk_commune"> 

    {{-- <livewire:listeprofile>             --}}

        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                <i class="fa fa-save fa-lg "></i>
                <span id="payment-button-amount">Enregistrer</span>                            
            </button>
        </div>

</form>
<br><br>

   {{-- <form  action="{{route('district.edit',$district_enr)}}" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        --}}
    
    @include('decoupage.districts.tblaffichagedistrict') 

           </div>
           
        </div>
    </div>
</div>  




@endsection