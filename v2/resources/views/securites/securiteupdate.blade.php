@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="/securite">Sécurité</a></li>
        <li class="active">modifier profile</li>
    </ol>
@endsection


@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des profiles - Modification/strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                


<form method="post" action="/securite/update" class="container">
   @csrf
   @foreach ($securite_enr as $securite_enrs)


    <div class="form-group">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Code</span>
        </div> --}}
        <label for="code" class=" form-control-label">code<span class="text-danger">*</span></label>
        <input type="text"  name="code" value="{{$securite_enrs->code}}" id="code" class="form-control {{$errors->has('code')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="code" aria-describedby="basic-addon1" readonly>
            @error('code')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    
    <div class="form-group">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Libellé</span>
        </div> --}}
        <label for="libelle" class=" form-control-label">libelle<span class="text-danger">*</span></label>
        <input type="text"  name="libelle" value="{{$securite_enrs->libelle}}" id="libelle" class="form-control {{$errors->has('libelle')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="libelle" aria-describedby="basic-addon1">
            @error('libelle')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Description</span>
        </div> --}}
        <label for="description" class=" form-control-label">description<span class="text-danger">*</span></label>
        <input type="text"  name="description" value="{{$securite_enrs->description}}" id="description" class="form-control {{$errors->has('description')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="description" aria-describedby="basic-addon1">
            @error('description')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="form-group">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Limitation visibilité </span>
        </div> --}}
        <label for="limitation" class=" form-control-label">limitation<span class="text-danger">*</span></label>
        <select class="form-control {{$errors->has('limitation')? 'is-invalid' :''}}" value={{ $securite_enrs->limitation }} id="limitation" name="limitation">
            <option value="">Selectionner la limite de la visibilité </option>
           @if($privilege->visibilite=='N') <option value="N" {{$securite_enrs->limitation == 'N' ? "selected" :""}} > Visibilité à l'échelle Nationale</option> @endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' ) <option value="R" {{$securite_enrs->limitation == 'R' ? "selected" :""}} > Visibilité à l'échelle Régionale</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' ) <option value="W" {{$securite_enrs->limitation == 'W' ? "selected" :""}} > Visibilité à l'échelle Wilaya</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D' ) <option value="D" {{$securite_enrs->limitation == 'D' ? "selected" :""}} > Visibilité à l'échelle Daira</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D' or $privilege->visibilite=='L')  <option value="L" {{$securite_enrs->limitation == 'L' ? "selected" :""}} > Visibilité à l'échelle Locale/Commune</option>@endif
            <option value="P" {{$securite_enrs->limitation == 'P' ? "selected" :""}} > Visibilité à l'échelle Individuelle</option>
   
        </select>        
      
       @error('limitation')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror    
    </div>    

   <button type="submit" class="btn btn-info boutonajout" > Enregistrer la modification</button>
   @endforeach   

</form>


   <form  action="/securite/modif" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        <!-- <button type="search" class="zonerecherche" </button> -->
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>       
    
    @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
  @if ($message = Session::get('warning'))
                          <div class="alert alert-warning">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
 @if ($message = Session::get('error'))
                          <div class="alert alert-danger">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif    

@include('securites.tblaffichagesecurite') 


               
                
</div>
           
           </div>
       </div>
   </div>  
   
@endsection