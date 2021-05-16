@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('constructionadresse.index',$constructionadresse_enr->fk_id_const)}}">Adressage</a></li>
        <li class="active">Modifier construction adresse</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">

    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>constructions adresse - Modification</strong><small>Formulaire</small></div>
            @include('admin.messages')

            <div class="card-body card-block">
                 

<form method="POST" action="{{route('constructionadresse.update',$constructionadresse_enr->id_constp)}}" >
   @csrf
   @method('PUT')

{{-- <div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code</span>
        </div>
        <input type="text"  name="id_constp" value="{{$constructionadresse_enr->id_constp}}" id="id_constp" class="form-control {{$errors->has('id_constp')? 'is-invalid' :''}}" placeholder="id_constp" aria-label="id_constp" aria-describedby="basic-addon1" readonly>
            @error('id_constp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}


<div class="form-group">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Désignation</span><span class="text-danger">*</span>
        </div>
        <input type="text"  name="nomp" value="{{$constructionadresse_enr->nomp}}" id="nomp" class="form-control {{$errors->has('nomp')? 'is-invalid' :''}}"  aria-label="nomp" aria-describedby="basic-addon1">
            @error('nomp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

                                    {{-- </div> --}}
<div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Désignation en arabe</span>
        </div>
        <input type="text"  name="nom_arabp" value="{{$constructionadresse_enr->nom_arabp}}" id="nom_arabp" class="form-control {{$errors->has('nom_arabp')? 'is-invalid' :''}}"  aria-label="nom_arabp" aria-describedby="basic-addon1">
            @error('nom_arabp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Numero</span>
        </div>
        <input type="text"  name="numerop" value="{{$constructionadresse_enr->numerop}}" id="numerop" class="form-control {{$errors->has('numerop')? 'is-invalid' :''}}"  aria-label="numerop" aria-describedby="basic-addon1">
            @error('numerop')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
                                    </div>
<div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Cote</span>
        </div>
        <input type="text"  name="cotep" value="{{$constructionadresse_enr->cotep}}" id="cotep" class="form-control {{$errors->has('cotep')? 'is-invalid' :''}}"  aria-label="cotep" aria-describedby="basic-addon1">
            @error('cotep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">type d'entrée</span>
        </div>
        <input type="text"  name="type_entreep" value="{{$constructionadresse_enr->type_entreep}}" id="type_entreep" class="form-control {{$errors->has('type_entreep')? 'is-invalid' :''}}"  aria-label="type_entreep" aria-describedby="basic-addon1">
            @error('type_entreep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    {{-- <livewire:listebagence> --}}

                                    </div>
<div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">pretype</span>
        </div>
        <input type="text"  name="pretypep" value="{{$constructionadresse_enr->pretypep}}" id="pretypep" class="form-control {{$errors->has('pretypep')? 'is-invalid' :''}}"  aria-label="pretypep" aria-describedby="basic-addon1">
            @error('pretypep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

 
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Rue</span>
        </div>
        <input type="text"  name="nom_ruep" value="{{$constructionadresse_enr->nom_ruep}}" id="nom_ruep" class="form-control {{$errors->has('nom_ruep')? 'is-invalid' :''}}"  aria-label="nom_ruep" aria-describedby="basic-addon1">
            @error('nom_ruep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
                                    </div>
                                    {{-- <livewire:wilaya-commune-construction :wilaya="$constructionadresse_enr->fk_id_wilaya " :commune="$constructionadresse_enr->fk_id_comn">  --}}
                                        <livewire:type-zone-voie :nature="$constructionadresse_enr->nature_zonep" :type="$constructionadresse_enr->nom_zonep">

                                    {{-- <livewire:type-zone-voie> --}}

<div class="form-row">
    <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Zone en arabe</span>
        </div>
        <input type="text"  name="nom_zone_arp" value="{{$constructionadresse_enr->nom_zone_arp}}" id="nom_zone_arp" class="form-control {{$errors->has('nom_zone_arp')? 'is-invalid' :''}}"  aria-label="nom_zone_arp" aria-describedby="basic-addon1">
        @error('nom_zone_arp')
        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror    
    </div>
    
    <div class="form-group col-6">
            <div class=" form-control-label">
                <span class=" form-control-label" id="basic-addon1">Rue en arabe</span>
            </div>
            <input type="text"  name="nom_rue_arp" value="{{$constructionadresse_enr->nom_rue_arp}}" id="nom_rue_arp" class="form-control {{$errors->has('nom_rue_arp')? 'is-invalid' :''}}"  aria-label="nom_rue_arp" aria-describedby="basic-addon1">
                @error('nom_rue_arp')
                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror    
        </div>
</div>
{{-- <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nature_zonep</span>
        </div>
        <input type="text"  name="nature_zonep" value="{{$constructionadresse_enr->nature_zonep}}" id="nature_zonep" class="form-control {{$errors->has('nature_zonep')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="nature_zonep" aria-describedby="basic-addon1">
            @error('nature_zonep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}
{{-- <div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nom_zonep</span>
        </div>
        <input type="text"  name="nom_zonep" value="{{$constructionadresse_enr->nom_zonep}}" id="nom_zonep" class="form-control {{$errors->has('nom_zonep')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="nom_zonep" aria-describedby="basic-addon1">
            @error('nom_zonep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


                                    </div> --}}
<div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Adresse</span><span class="text-danger">*</span>
        </div>
        <input type="text"  name="nom_adressep" value="{{$constructionadresse_enr->nom_adressep}}" id="nom_adressep" class="form-control {{$errors->has('nom_adressep')? 'is-invalid' :''}}"  aria-label="nom_adressep" aria-describedby="basic-addon1">
            @error('nom_adressep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>




 
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Adresse en arabe</span>
        </div>
        <input type="text"  name="nom_adresse_arp" value="{{$constructionadresse_enr->nom_adresse_arp}}" id="nom_adresse_arp" class="form-control {{$errors->has('nom_adresse_arp')? 'is-invalid' :''}}"  aria-label="nom_adresse_arp" aria-describedby="basic-addon1">
            @error('nom_adresse_arp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
                                    </div>
<div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">Occupation</span>
        </div>
        <input type="text"  name="occupationp" value="{{$constructionadresse_enr->occupationp}}" id="occupationp" class="form-control {{$errors->has('occupationp')? 'is-invalid' :''}}"  aria-label="occupationp" aria-describedby="basic-addon1">
            @error('occupationp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">état</span><span class="text-danger">*</span>
        </div>
        <input type="text"  name="etat_constp" value="{{$constructionadresse_enr->etat_constp}}" id="etat_constp" class="form-control {{$errors->has('etat_constp')? 'is-invalid' :''}}"  aria-label="etat_constp" aria-describedby="basic-addon1">
            @error('etat_constp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>
    {{--                                 </div>
<div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">daira</span>
        </div>
        <input type="text"  name="daira" value="{{$constructionadresse_enr->daira}}" id="daira" class="form-control {{$errors->has('daira')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="daira" aria-describedby="basic-addon1">
            @error('daira')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>







                                    </div>
<div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">wilaya</span>
        </div>
        <input type="text"  name="wilaya" value="{{$constructionadresse_enr->wilaya}}" id="wilaya" class="form-control {{$errors->has('wilaya')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="wilaya" aria-describedby="basic-addon1">
            @error('wilaya')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}
{{-- <div class="form-row"> --}}
{{-- <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">geom</span>
        </div>
        <input type="text"  name="geom" value="{{$constructionadresse_enr->geom}}" id="geom" class="form-control {{$errors->has('geom')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="geom" aria-describedby="basic-addon1">
            @error('geom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}
 
{{-- <div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">fk_id_const</span>
        </div>
        <input type="text"  name="fk_id_const" value="{{$constructionadresse_enr->fk_id_const}}" id="fk_id_const" class="form-control {{$errors->has('fk_id_const')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="fk_id_const" aria-describedby="basic-addon1" readonly>
            @error('fk_id_const')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div> --}}

    {{--                                 </div>
<div class="form-row">
<div class="form-group col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">fk_id_com</span>
        </div>
        <input type="text"  name="fk_id_com" value="{{$constructionadresse_enr->fk_id_com}}" id="fk_id_com" class="form-control {{$errors->has('fk_id_com')? 'is-invalid' :''}}" placeholder="exemple: amar.zekri@ctc-dz.org" aria-label="fk_id_com" aria-describedby="basic-addon1">
            @error('fk_id_com')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    {{-- <livewire:wilaya-commune-construction-adresse> --}}
        <div class="form-group >
            <label for="exampleFormControlSelect1">construction<span class="text-danger">*</span></label>
            <select class="form-control @error('fk_id_const') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_const" wire:model='commune_id' value="{{ old('commune_id') }}" >
                <option value="{{ $construction->id_const }}" selected >{{$construction->nom}}</option>
                {{-- @foreach ($constructions as $constructions)
                <option value="{{ $constructions->id_const }}"> {{ $constructions->nom}}</option>
              @endforeach --}}
            </select>     
            @error('fk_id_const')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>                                
            @enderror
                                 
        </div> 

        <livewire:wilaya-commune-construction :wilaya="$constructionadresse_enr->fk_id_wilaya " :commune="$constructionadresse_enr->fk_id_comn"> 




            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                    <i class="fa fa-save fa-lg "></i>
                    <span id="payment-button-amount">Enregistrer</span>                            
                </button>
            </div>
        
  
</form>


<br>
<br>
@include('constructions.constructionsadresses.tblaffichageconstructionadresse') 
</div>

        </div>
    </div>
</div>





@endsection