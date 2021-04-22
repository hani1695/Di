@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('constructionadresse.index',$constructionadresse_enr->id_constp)}}">constructions adresse</a></li>
        <li class="active">Modifier construction adresse</li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>constructions adresse - Modification</strong><small></small></div>
            <div class="card-body card-block">
                 

{{-- <form method="POST" action="{{route('constructionadresse.update',$constructionadresse_enr->id_constp)}}" class="container">
   @csrf
   @method('PUT') --}}

<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">code</span>
        </div>
        <input type="text"  name="id_constp" value="{{$constructionadresse_enr->id_constp}}" id="id_constp"  class="form-control {{$errors->has('id_constp')? 'is-invalid' :''}}"  aria-label="id_constp" aria-describedby="basic-addon1" readonly>
            @error('id_constp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

     
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nomp</span>
        </div>
        <input type="text"  name="nomp" value="{{$constructionadresse_enr->nomp}}" id="nomp" readonly class="form-control {{$errors->has('nomp')? 'is-invalid' :''}}"  aria-label="nomp" aria-describedby="basic-addon1">
            @error('nomp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nom_arabp</span>
        </div>
        <input type="text"  name="nom_arabp" value="{{$constructionadresse_enr->nom_arabp}}" id="nom_arabp" readonly class="form-control {{$errors->has('nom_arabp')? 'is-invalid' :''}}"  aria-label="nom_arabp" aria-describedby="basic-addon1">
            @error('nom_arabp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">numerop</span>
        </div>
        <input type="text"  name="numerop" value="{{$constructionadresse_enr->numerop}}" id="numerop" readonly class="form-control {{$errors->has('numerop')? 'is-invalid' :''}}"  aria-label="numerop" aria-describedby="basic-addon1">
            @error('numerop')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">cotep</span>
        </div>
        <input type="text"  name="cotep" value="{{$constructionadresse_enr->cotep}}" id="cotep" readonly class="form-control {{$errors->has('cotep')? 'is-invalid' :''}}"  aria-label="cotep" aria-describedby="basic-addon1">
            @error('cotep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


     
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">type_entreep</span>
        </div>
        <input type="text"  name="type_entreep" value="{{$constructionadresse_enr->type_entreep}}" id="type_entreep" readonly class="form-control {{$errors->has('type_entreep')? 'is-invalid' :''}}"  aria-label="type_entreep" aria-describedby="basic-addon1">
            @error('type_entreep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>


    {{-- <livewire:listebagence> --}}

     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">pretypep</span>
        </div>
        <input type="text"  name="pretypep" value="{{$constructionadresse_enr->pretypep}}" id="pretypep" readonly class="form-control {{$errors->has('pretypep')? 'is-invalid' :''}}" aria-label="pretypep" aria-describedby="basic-addon1">
            @error('pretypep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nom_ruep</span>
        </div>
        <input type="text"  name="nom_ruep" value="{{$constructionadresse_enr->nom_ruep}}" id="nom_ruep" readonly class="form-control {{$errors->has('nom_ruep')? 'is-invalid' :''}}"  aria-label="nom_ruep" aria-describedby="basic-addon1">
            @error('nom_ruep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nom_rue_arp</span>
        </div>
        <input type="text"  name="nom_rue_arp" value="{{$constructionadresse_enr->nom_rue_arp}}" id="nom_rue_arp" readonly class="form-control {{$errors->has('nom_rue_arp')? 'is-invalid' :''}}"  aria-label="nom_rue_arp" aria-describedby="basic-addon1">
            @error('nom_rue_arp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nature_zonep</span>
        </div>
        <input type="text"  name="nature_zonep" value="{{$constructionadresse_enr->nature_zonep}}" id="nature_zonep" readonly class="form-control {{$errors->has('nature_zonep')? 'is-invalid' :''}}"  aria-label="nature_zonep" aria-describedby="basic-addon1">
            @error('nature_zonep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nom_zonep</span>
        </div>
        <input type="text"  name="nom_zonep" value="{{$constructionadresse_enr->nom_zonep}}" id="nom_zonep" readonly class="form-control {{$errors->has('nom_zonep')? 'is-invalid' :''}}"  aria-label="nom_zonep" aria-describedby="basic-addon1">
            @error('nom_zonep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nom_zone_arp</span>
        </div>
        <input type="text"  name="nom_zone_arp" value="{{$constructionadresse_enr->nom_zone_arp}}" id="nom_zone_arp" readonly class="form-control {{$errors->has('nom_zone_arp')? 'is-invalid' :''}}"  aria-label="nom_zone_arp" aria-describedby="basic-addon1">
            @error('nom_zone_arp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nom_adressep</span>
        </div>
        <input type="text"  name="nom_adressep" value="{{$constructionadresse_enr->nom_adressep}}" id="nom_adressep" readonly class="form-control {{$errors->has('nom_adressep')? 'is-invalid' :''}}"  aria-label="nom_adressep" aria-describedby="basic-addon1">
            @error('nom_adressep')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>




    
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">nom_adresse_arp</span>
        </div>
        <input type="text"  name="nom_adresse_arp" value="{{$constructionadresse_enr->nom_adresse_arp}}" id="nom_adresse_arp" readonly class="form-control {{$errors->has('nom_adresse_arp')? 'is-invalid' :''}}"  aria-label="nom_adresse_arp" aria-describedby="basic-addon1">
            @error('nom_adresse_arp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">occupationp</span>
        </div>
        <input type="text"  name="occupationp" value="{{$constructionadresse_enr->occupationp}}" id="occupationp" readonly class="form-control {{$errors->has('occupationp')? 'is-invalid' :''}}"  aria-label="occupationp" aria-describedby="basic-addon1">
            @error('occupationp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">etat_constp</span>
        </div>
        <input type="text"  name="etat_constp" value="{{$constructionadresse_enr->etat_constp}}" id="etat_constp" readonly class="form-control {{$errors->has('etat_constp')? 'is-invalid' :''}}"  aria-label="etat_constp" aria-describedby="basic-addon1">
            @error('etat_constp')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">daira</span>
        </div>
        <input type="text"  name="daira" value="{{$constructionadresse_enr->daira}}" id="daira" readonly class="form-control {{$errors->has('daira')? 'is-invalid' :''}}"  aria-label="daira" aria-describedby="basic-addon1">
            @error('daira')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>







    
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">wilaya</span>
        </div>
        <input type="text"  name="wilaya" value="{{$constructionadresse_enr->wilaya}}" id="wilaya" readonly class="form-control {{$errors->has('wilaya')? 'is-invalid' :''}}"  aria-label="wilaya" aria-describedby="basic-addon1">
            @error('wilaya')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
     </div>
<div class="form-row">
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">geom</span>
        </div>
        <input type="text"  name="geom" value="{{$constructionadresse_enr->geom}}" id="geom" readonly class="form-control {{$errors->has('geom')? 'is-invalid' :''}}"  aria-label="geom" aria-describedby="basic-addon1">
            @error('geom')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    
   <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">construction</span>
        </div>
        <input type="text"  name="fk_id_const" value="{{$constructionadresse_enr->nom}}" id="fk_id_const" readonly class="form-control {{$errors->has('fk_id_const')? 'is-invalid' :''}}"  aria-label="fk_id_const" aria-describedby="basic-addon1" readonly>
            @error('fk_id_const')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
</div>         {{--cle etrangere---}}
    {{-- <div class="form-group  col-6">
        <div class=" form-control-label">
            <span class=" form-control-label" id="basic-addon1">fk_id_com</span>
        </div>
        <input type="text"  name="fk_id_com" value="{{$constructionadresse_enr->fk_id_com}}" id="fk_id_com" readonly class="form-control {{$errors->has('fk_id_com')? 'is-invalid' :''}}"  aria-label="fk_id_com" aria-describedby="basic-addon1">
            @error('fk_id_com')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div> --}}

    {{-- <livewire:wilaya-commune-construction-adresse-update> --}}



        {{-- <button type="submit" class="btn btn-info boutonajgout" > Enregistrer la modification</button>
        
  
</form> --}}


           </div>
           <br>
        <br>
        {{-- @include('constructions.constructionsadresses.tblaffichageconstructionadresse')  --}}

        </div>
    </div>
</div>





@endsection