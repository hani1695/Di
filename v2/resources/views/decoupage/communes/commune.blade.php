@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Découpage Administratif</a></li>
        <li class="active">Commune</li>
    </ol>
@endsection

@section('content')
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Liste des communes</strong><small> </small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample"  >
                    Ajouter une commune
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                    {{-- {{ route('commune.store') }} --}}
                        <form action="{{ route('commune.store') }}" method="post" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                    <div class="form-group col-6">
                                       <label for="code_c" class=" form-control-label">Code <span class="text-danger">*</span></label>
                                       <input type="text" id="code_c"  class="form-control @error('code_c') is-invalid @enderror" name="code_c" value="{{ old('code_c') }}"autofocus>
                                       @error('code_c')
                                           <span class="invalid-feedback" role="alert">
                                               {{ $message }}
                                           </span>                                
                                       @enderror
                                   </div> 
                                    <div class="form-group col-6">
                                        <label for="elevation" class=" form-control-label">Elevation<span class="text-danger"></span></label>
                                        <input type="text" id="elevation" placeholder="elevation" class="form-control @error('elevation') is-invalid @enderror" name="elevation" value="{{ old('elevation') }}">
                                        @error('elevation')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                            </div>

                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="nom_c" class=" form-control-label">  Commune<span class="text-danger">*</span></label>
                                            <input type="text" id="nom_c" placeholder="nom " class="form-control @error('nom_c') is-invalid @enderror" name="nom_c" value="{{ old('nom_c') }}">
                                            @error('nom_c')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                        </div>

                                            <div class="form-group col-6">
                                                <label for="nom_c_arb" class=" form-control-label">  Commune en arabe<span class="text-danger"></span></label>
                                                <input type="text" id="nom_c_arb" placeholder="nom arabe" class="form-control @error('nom_c_arb') is-invalid @enderror" value="{{ old('nom_c_arb') }}"name="nom_c_arb">
                                                @error('nom_c_arb')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>                                
                                                @enderror
                                            </div>
                                    </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="siege_c" class=" form-control-label">Siege commune <span class="text-danger"></span></label>
                                    <input type="text" id="siege_c" placeholder="siege " class="form-control @error('siege_c') is-invalid @enderror" value="{{ old('siege_c') }}"name="siege_c" >
                                    @error('siege_c')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="autre_nom_c" class=" form-control-label">Autre nom commune <span class="text-danger"></span></label>
                                    <input type="text" id="autre_nom_c" placeholder="autre_nom_c" class="form-control @error('autre_nom_c') is-invalid @enderror" value="{{ old('autre_nom_c') }}"name="autre_nom_c" >
                                    @error('autre_nom_c')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>

                   <div class="form-row ">
                                     <div class="form-group col-6">
                                <label for="nature_c" class=" form-control-label">Nature commune<span class="text-danger"></span></label>
                                <input type="text" id="nature_c" placeholder="nature" class="form-control @error('nature_c') is-invalid @enderror" value="{{ old('nature_c') }}"name="nature_c" >
                                @error('nature_c')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
                                     <div class="form-group col-6">
                                <label for="source_donnees" class=" form-control-label">Source de données<span class="text-danger"></span></label>
                                <input type="text" id="source_donnees" placeholder="source donnees" class="form-control @error('source_donnees') is-invalid @enderror" value="{{ old('source_donnees') }}"name="source_donnees" >
                                @error('source_donnees')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div>
                        </div>

                           {{-- <div class="form-row"> --}}
                                {{-- <div class="form-group col-6">
                                    <label for="geom_com" class=" form-control-label">geom commune <span class="text-danger">*</span></label>
                                    <input type="text" id="geom_com" placeholder="geom" class="form-control  @error('geom_com') is-invalid @enderror" name="geom_com" value="{{ old('geom_com') }}">
                                    @error('geom_com')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                    @enderror
                                </div> --}}
                           
                                    <div class="form-group ">
                                        <label for="zone_sis" class=" form-control-label">Zone sis <span class="text-danger"></span></label>
                                        <input type="text" id="zone_sis" placeholder="zone" class="form-control  @error('zone_sis') is-invalid @enderror" name="zone_sis" value="{{ old('zone_sis') }}">
                                        @error('zone_sis')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                                {{-- </div>  --}}
                                <div class="form-row">

                                    <div class="form-group col-6">
                                        <label for="distance_chef" class=" form-control-label">Distance chef<span class="text-danger"></span></label>
                                        <input type="text" id="distance_chef" placeholder="distance chef" class="form-control  @error('distance_chef') is-invalid @enderror" name="distance_chef" value="{{ old('distance_chef') }}">
                                        @error('distance_chef')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                        @enderror
                                    </div>
                               
                                     <div class="form-group col-6">
                                    <label for="population" class=" form-control-label">Population<span class="text-danger"></span></label>
                                    <input type="text" id="population" placeholder="population" class="form-control @error('population') is-invalid @enderror" value="{{ old('population') }}"name="population" >
                                    @error('population')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>

                       <div class="form-row">
                                     <div class="form-group col-6">
                                    <label for="surface" class=" form-control-label">Surface<span class="text-danger"></span></label>
                                    <input type="text" id="surface" placeholder="surface" class="form-control @error('surface') is-invalid @enderror" value="{{ old('surface') }}"name="surface" >
                                    @error('surface')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                                     <div class="form-group col-6">
                                    <label for="zone_vent" class=" form-control-label">Zone vent<span class="text-danger"></span></label>
                                    <input type="text" id="zone_vent" placeholder="zone vent" class="form-control @error('zone_vent') is-invalid @enderror" value="{{ old('zone_vent') }}"name="zone_vent" >
                                    @error('zone_vent')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            </div>

                       {{-- <div class="form-row"> --}}
                                     <div class="form-group">
                                    <label for="zone_niege" class=" form-control-label">Zone niege<span class="text-danger"></span></label>
                                    <input type="text" id="zone_niege" placeholder="zone niege" class="form-control @error('zone_niege') is-invalid @enderror" value="{{ old('zone_niege') }}"name="zone_niege" >
                                    @error('zone_niege')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>

                                <livewire:wilaya-daira>

                                {{-- <div class="form-row">

                                <div class="form-group col-6">
                                    <label for="exampleFormControlSelect1">wilaya <span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_wilaya">
                                        <option value="" selected disabled>Séléctionner wilaya</option>
                                        @foreach ($wilayas as $wilaya)
                                        <option value="{{ $wilaya->code_w }}"> {{ $wilaya->nom_w }}</option>
                                      @endforeach
                                    </select>     
                                    @error('fk_wilaya')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                                <div class="form-group col-6">
                                    <label for="exampleFormControlSelect1">daira <span class="text-danger">*</span></label>
                                    <select class="form-control @error('fk_diara') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_diara">
                                        <option value="" selected disabled>Séléctionner daira</option>
                                        @foreach ($dairas as $daira)
                                        <option value="{{ $daira->code_d }}"> {{ $daira->nom_d }}</option>
                                      @endforeach
                                    </select>     
                                    @error('fk_diara')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                                         
                                </div> 
                            </div>            --}}
                            @csrf                    
                            <div   class="form-group ">
                                <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                                    <i class="fa fa-save fa-lg "></i>
                                    <span id="payment-button-amount">Enregistrer</span>                            
                                </button>
                            </div>
                        </form>
                   </div>
                  </div>
                @endif
            </div>
<div class="card-body card-block">


 @include('decoupage.communes.tblaffichagecommune') 


</div>
               
</div>
</div>
</div> 


@endsection

<script>

// window.addEventListener('load', function () {
//   console.log('Cette fonction est exécutée une fois quand la page est chargée.');

//   var parenta = document.getElementById("cs");
//   var parentm = document.getElementById("cs");
//   var parentc = document.getElementById("i");


//   var a = document.getElementById("c1");
//       var m = document.getElementById("s1");
//       var c = document.getElementById("i1");
      
//       parenta.removeChild(a);
//       parentm.removeChild(m);
//       parentc.removeChild(c);

//     //   a.style.display = "none"; 
//     //       m.style.display = "none";   
//     //       c.style.display = "none";   

// });


</script>