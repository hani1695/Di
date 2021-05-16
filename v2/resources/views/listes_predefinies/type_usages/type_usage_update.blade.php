@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('usage.index')}}">listes prédéfinies</a></li>
        <li class="active"> types d'usage</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Modifier un type d'usage - Modification</strong><small> </small></div>
            <div class="card-body card-block">
                 

<form method="POST" action="{{route('usage.update',$usage_enr->Code_usage_const)}}" >
   @csrf
   @method('PUT')

   {{-- <div class="form-group ">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Code usage</span>
        </div>
        <input type="text"  name="Code_usage_const" value="{{$usage_enr->Code_usage_const}}" id="Code_usage_const" class="form-control {{$errors->has('Code_usage_const')? 'is-invalid' :''}}" placeholder="Code_usage_const" aria-label="Code_usage_const" aria-describedby="basic-addon1" readonly>
            @error('Code_usage_const')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    <div class="row">   
        <div class="form-group col-6" >
            <label for="usage">famille usage<span class="text-danger">*</span></label>
            <select class="form-control @error('Famille_usage_const') is-invalid @enderror" id="Famille_usage_const" name="Famille_usage_const" wire:model='famille_id' >
                <option value="" selected disabled>Séléctionner famille usage</option>
                @foreach ($usage_famille as $Famille_usage_const)
                <option value="{{ $Famille_usage_const->Famille_usage_const }}"> {{ $Famille_usage_const->Famille_usage_const }}</option>
              @endforeach
            </select>     
            @error('Famille_usage_const')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>                                
            @enderror
                                
        </div> 
    <div class="form-group col-6 "> 
        <label for="usage">usage <span class="text-danger">*</span></label>
        <input type="text" id="Detail_usage_const" placeholder="" class="form-control @error('Detail_usage_const') is-invalid @enderror" name="Detail_usage_const" value="{{$usage_enr->Detail_usage_const}}"autofocus>
                                    @error('Detail_usage_const')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror                       
    </div>
</div>

    {{-- <livewire:type-usage> --}}

    

    
        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                <i class="fa fa-save fa-lg "></i>
                <span id="payment-button-amount">Enregistrer</span>                            
            </button>
        </div>

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