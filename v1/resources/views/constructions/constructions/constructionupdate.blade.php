@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('construction.index')}}">constructions</a></li>
        <li class="active">Modifier la construction</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des constructions - Modification</strong><small>Formulaire</small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('construction.update',$construction_enr->id_const)}}" class="container">
   @csrf
   @method('PUT')

   <div class="form-row">
   <div class="form-group col-6">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">code</span>
        </div> --}}
        <label for="id_const" class=" form-control-label">code construction<span class="text-danger">*</span></label>
        <input type="text"  name="id_const" value="{{$construction_enr->id_const}}" id="id_const" class="form-control {{$errors->has('id_const')? 'is-invalid' :''}}" placeholder="id_const" aria-label="id_const" aria-describedby="basic-addon1" readonly>
            @error('id_const')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group col-6">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">nom</span>
        </div> --}}
        <label for="nom" class=" form-control-label">nom<span class="text-danger">*</span></label>
        <input type="text"  name="nom" value="{{$construction_enr->nom}}" id="nom" class="form-control {{$errors->has('nom')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="nom" aria-describedby="basic-addon1">
            @error('nom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>
<div class="form-row">

    <div class="form-group col-6">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">nom_arab</span>
        </div> --}}
        <label for="nom_arab" class=" form-control-label"> nom arabe<span class="text-danger">*</span></label>
        <input type="text"  name="nom_arab" value="{{$construction_enr->nom_arab}}" id="nom_arab" class="form-control {{$errors->has('nom_arab')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="nom_arab" aria-describedby="basic-addon1">
            @error('nom_arab')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
    <div class="form-group col-6" >
        <label for="usage">usage<span class="text-danger">*</span></label>
        <select class="form-control @error('usage') is-invalid @enderror" id="usage" name="usage" wire:model='commune_id' >
            <option value="" selected disabled>Séléctionner usage</option>
            @foreach ($usages as $usage)
            <option value="{{ $usage->Libelle_ouvr2 }}"> {{ $usage->Libelle_ouvr2 }}</option>
          @endforeach
        </select>     
        @error('usage')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror
                            
    </div> 
</div>
<div class="form-row">

    <div class="form-group col-6">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">etat de construction</span>
        </div> --}}
        <label for="etat_const" class=" form-control-label">etat construction<span class="text-danger">*</span></label>
        <input type="text"  name="etat_const" value="{{$construction_enr->etat_const}}" id="etat_const" class="form-control {{$errors->has('etat_const')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="etat_const" aria-describedby="basic-addon1">
            @error('etat_const')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    {{-- <div class="form-group col-6">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">daira</span>
        </div>
        <input type="text"  name="daira" value="{{$construction_enr->daira}}" id="daira" class="form-control {{$errors->has('daira')? 'is-invalid' :''}}" placeholder="exemple: agence x" aria-label="daira" aria-describedby="basic-addon1" 
            @error('daira')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div> --}}

    {{-- <livewire:listebagence> --}}

    {{-- <div class="form-group col-6">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">wilaya</span>
        </div>
        <input type="text"  name="wilaya" value="{{$construction_enr->wilaya}}" id="wilaya" class="form-control {{$errors->has('wilaya')? 'is-invalid' :''}}" placeholder="exemple: directeur" aria-label="wilaya" aria-describedby="basic-addon1">
            @error('wilaya')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="form-group col-6">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">geom</span>
        </div> --}}
        <label for="geom" class=" form-control-label">geom<span class="text-danger">*</span></label>
        <input type="text"  name="geom" value="{{$construction_enr->geom}}" id="geom" class="form-control {{$errors->has('geom')? 'is-invalid' :''}}" aria-label="geom" aria-describedby="basic-addon1">
            @error('geom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>

    {{-- <livewire:decoupage> --}}
        <livewire:wilaya-commune-construction>

        <button type="submit" class="btn btn-info boutonajgout" > Enregistrer la modification</button>
        
  
</form>


           </div>
           <br>
        <br>
        @include('constructions.constructions.tblaffichageconstruction') 
        </div>
    </div>
</div>





@endsection

