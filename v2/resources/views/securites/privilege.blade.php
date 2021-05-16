@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="/securite">Sécurité</a></li>
        <li class="active">Attribution privilèges</li>
    </ol>
@endsection


@section('content')
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Attribution des privileges</strong><small> Formulaire</small></div>
            <div class="card-body card-block">
                



<form method="post" action="/securite/privilegeajout" class="container">
   @csrf

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Code</span>
        </div>
        <input type="text"  name="code" value="{{$privilegeuser_enrs->code}}" id="code" class="form-control {{$errors->has('code')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="code" aria-describedby="basic-addon1" readonly>
            @error('code')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Libellé</span>
        </div>
        <input type="text"  name="libelle" value="{{$privilegeuser_enrs->libelle}}" id="libelle" class="form-control {{$errors->has('libelle')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="libelle" aria-describedby="basic-addon1" readonly>
            @error('libelle')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Description</span>
        </div>
        <input type="text"  name="description" value="{{$privilegeuser_enrs->description}}" id="description" class="form-control {{$errors->has('description')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="description" aria-describedby="basic-addon1" readonly>
            @error('description')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    @if ($privilegeusers->isEmpty())
   <button type="submit" class="btn btn-info boutonajout" > Ajout objets pour attribution des privilèges</button>
   
   <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Visibilité </span>
        </div>
        <select class="form-control {{$errors->has('visibilite')? 'is-invalid' :''}}" id="listenomdr" name="visibilite">
            <option value="" disabled>Selectionner l'étendu de la visibilité </option>
            <option value="N" > Visibilité échelle Nationale</option>
            <option value="R" > Visibilité échelle Régionale</option>
            <option value="W" > Visibilité échelle Wilaya</option>
            <option value="D" > Visibilité échelle Daira</option>
            <option value="L" > Visibilité échelle Locale/commune</option>
            <option value="P" > Visibilité échelle Individuelle</option>
               
        </select>        
      
       @error('visibilite')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror    
    </div>
    @endif
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
<!-- 
   <form  action="/securite/privilege" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ...">
        
        <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        -->
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover table-sm" width="100%" style="white-space: nowrap ;">
        <tr>
            <th>N°</th>
            <th>profile_code</th>
            <th>Application volet</th>
            <th>Description</th>
            <th>Consultation</th>
            <th>Modification</th>
            <th>Insertion</th>
            <th>Suppression</th>
            <th>validation</th>
            <th>telecharger</th>
            <th>imprimer</th>
            <th>importer</th>
            <th>historique</th>
            <th>exporter</th>
            <th>permission</th>
            <th>Visibilité</th>
            <th>Action</th>
        </tr>

        @foreach ($privilegeusers as $privilegeuser)
            <tr > 
                <td>  {{ $loop->index +1}} </td>
                <td >  {{ $privilegeuser->profile_code  }}   </td>
                <td class="tdlibelle">  {{ $privilegeuser->volet_app  }}   </td>
                <td class="tdlibelle">  {{ $privilegeuser->description  }}   </td>
                <td >  {{ $privilegeuser->consultation  }}   </td>
                <td >  {{ $privilegeuser->modification  }}   </td>
                <td >  {{ $privilegeuser->insertion  }}   </td>
                <td >  {{ $privilegeuser->suppression  }}   </td>
                <td >  {{ $privilegeuser->validation  }}   </td>
                <td >  {{ $privilegeuser->telecharger  }}   </td>
                <td >  {{ $privilegeuser->imprimer  }}   </td>
                <td >  {{ $privilegeuser->importer  }}   </td>
                <td >  {{ $privilegeuser->historique  }}   </td>
                <td >  {{ $privilegeuser->exporter  }}   </td>
                <td >  {{ $privilegeuser->gerer_permission  }}   </td>
                <td >  {{ $privilegeuser->visibilite  }}   </td>
                <td>
                @if ( $privilege->gerer_permission) <a href="/securite/privilegemodif/{{$privilegeuser->profile_code}}/{{$privilegeuser->volet_app}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif           
                      
                 </td>
            </tr> 
         @endforeach
      
</table>
</div>

                
                
</div>
           
           </div>
       </div>
   </div>  
   
    
 <script>
  function myFunction() {
      if(!confirm("Est ce que vous êtes sûr de vouloir supprimer cet enregistrement ?"))
      event.preventDefault();
  } 
 </script>

@endsection