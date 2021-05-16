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
            <div class="card-header"><strong>Modifier des privileges</strong><small> Formulaire</small></div>
            <div class="card-body card-block">

<form method="post" action="/securite/privilegeupdate" class="container">
   @csrf
     <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Profile_code</span>
        </div>
        <input type="text"  name="profile_code" value="{{$privilegeuser_enr->profile_code}}" id="profile_code" class="form-control {{$errors->has('profile_code')? 'is-invalid' :''}}" placeholder="exemple: 00001" aria-label="profile_code" aria-describedby="basic-addon1" readonly>
            @error('profile_code')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Libellé</span>
        </div>
        <input type="text"  name="libelle" value="{{$privilegeuser_enr->libelle}}" id="libelle" class="form-control {{$errors->has('libelle')? 'is-invalid' :''}}" placeholder="exemple: zekri" aria-label="libelle" aria-describedby="basic-addon1" readonly>
            @error('libelle')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">volet_app</span>
        </div>
        <input type="text"  name="volet_app" value="{{$privilegeuser_enr->volet_app}}" id="volet_app" class="form-control {{$errors->has('volet_app')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="volet_app" aria-describedby="basic-addon1" readonly>
            @error('volet_app')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">consultation</span>
        </div>
        <input type="checkbox"  name="consultation" @if($privilegeuser_enr->consultation==1) checked @endif  value="{{$privilegeuser_enr->consultation}}" id="consultation" class="form-control {{$errors->has('consultation')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="consultation" aria-describedby="basic-addon1" readonly>
            @error('consultation')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    

        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">modification</span>
        </div>
        <input type="checkbox"  name="modification" @if($privilegeuser_enr->modification==1) checked @endif  value="{{$privilegeuser_enr->modification}}" id="modification" class="form-control {{$errors->has('modification')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="modification" aria-describedby="basic-addon1" readonly>
            @error('modification')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    

        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">insertion</span>
        </div>
        <input type="checkbox"  name="insertion" @if($privilegeuser_enr->insertion==1) checked @endif  value="{{$privilegeuser_enr->insertion}}" id="insertion" class="form-control {{$errors->has('insertion')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="insertion" aria-describedby="basic-addon1" readonly>
            @error('insertion')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    

        <div class="input-group-prepend ">
            <span class="input-group-text " id="basic-addon1">suppression</span>
        </div>
        <input type="checkbox"  name="suppression" @if($privilegeuser_enr->suppression==1) checked @endif  id="suppression" class="form-control {{$errors->has('suppression')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="suppression" aria-describedby="basic-addon1" readonly>

            @error('suppression')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror   

        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">validation</span>
        </div>
        <input type="checkbox"  name="validation" @if($privilegeuser_enr->validation==1) checked @endif  value="{{$privilegeuser_enr->validation}}" id="validation" class="form-control {{$errors->has('validation')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="validation" aria-describedby="basic-addon1" readonly>
            @error('validation')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    

</div>

<div class="input-group mb-3">

        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">téléchargement</span>
        </div>
        <input type="checkbox"  name="telecharger" @if($privilegeuser_enr->telecharger==1) checked @endif  value="{{$privilegeuser_enr->telecharger}}" id="telecharger" class="form-control {{$errors->has('telecharger')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="telecharger" aria-describedby="basic-addon1" readonly>
            @error('telecharger')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    


        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">impression</span>
        </div>
        <input type="checkbox"  name="imprimer" @if($privilegeuser_enr->imprimer==1) checked @endif  value="{{$privilegeuser_enr->imprimer}}" id="imprimer" class="form-control {{$errors->has('imprimer')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="imprimer" aria-describedby="basic-addon1" readonly>
            @error('imprimer')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    

            <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">importation</span>
        </div>
        <input type="checkbox"  name="importer" @if($privilegeuser_enr->importer==1) checked @endif  value="{{$privilegeuser_enr->importer}}" id="importer" class="form-control {{$errors->has('importer')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="importer" aria-describedby="basic-addon1" readonly>
            @error('importer')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror   

        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">historique</span>
        </div>
        <input type="checkbox"  name="historique" @if($privilegeuser_enr->historique==1) checked @endif  value="{{$privilegeuser_enr->historique}}" id="historique" class="form-control {{$errors->has('historique')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="historique" aria-describedby="basic-addon1" readonly>
            @error('historique')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">exportation</span>
        </div>
        <input type="checkbox"  name="exporter" @if($privilegeuser_enr->exporter==1) checked @endif  value="{{$privilegeuser_enr->exporter}}" id="exporter" class="form-control {{$errors->has('exporter')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="exporter" aria-describedby="basic-addon1" readonly>
            @error('exporter')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">gest_permission</span>
        </div>
        <input type="checkbox"  name="gerer_permission" @if($privilegeuser_enr->gerer_permission==1) checked @endif  value="{{$privilegeuser_enr->gerer_permission}}" id="gerer_permission" class="form-control {{$errors->has('gerer_permission')? 'is-invalid' :''}}" placeholder="exemple: amar" aria-label="gerer_permission" aria-describedby="basic-addon1" readonly>
            @error('gerer_permission')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror    

            </div>

<div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Visibilité </span>
        </div>
        <select class="form-control {{$errors->has('visibilite')? 'is-invalid' :''}}" value={{ $privilegeuser_enr->visibilite }} id="listenomdr" name="visibilite">
            <option value="">Selectionner l'étendu de la visibilité </option>
           @if($privilege->visibilite=='N') <option value="N" {{$privilegeuser_enr->visibilite == 'N' ? "selected" :""}} > Visibilité échelle Nationale</option> @endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' ) <option value="R" {{$privilegeuser_enr->visibilite == 'R' ? "selected" :""}} > Visibilité échelle Régionale</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' ) <option value="W" {{$privilegeuser_enr->visibilite == 'W' ? "selected" :""}} > Visibilité échelle Wilaya</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D')  <option value="D" {{$privilegeuser_enr->visibilite == 'D' ? "selected" :""}} > Visibilité échelle Daira</option>@endif           
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D' or $privilege->visibilite=='L')  <option value="L" {{$privilegeuser_enr->visibilite == 'L' ? "selected" :""}} > Visibilité échelle Locale/Commune</option>@endif
           @if($privilege->visibilite=='N' or $privilege->visibilite=='R' or $privilege->visibilite=='W' or $privilege->visibilite=='D' or $privilege->visibilite=='L' or $privilege->visibilite=='P') <option value="P" {{$privilegeuser_enr->visibilite == 'P' ? "selected" :""}} > Visibilité échelle Individuelle</option>@endif
        </select>        
      
       @error('visibilite')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror    
    </div>
 
   <button type="submit" class="btn btn-info boutonajout" > Enregistrer les privilèges</button>
 
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
   <!-- <form  action="/privilege/privilege" class="container">
   <input type="search" name="search" id="search" value="{{request('search')}}" placeholder="Rechercher ..."> -->
        <!-- <button type="search" class="zonerecherche" </button> -->
        <!-- <button type="submit" class="btn btn-info boutonrecherche" > Rechercher</button>      

    </form>        -->

<table class="table table-bordered table-striped table-hover table-sm" width="100%">
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

 <script>
  function myFunction() {
      if(!confirm("Est ce que vous êtes sûr de vouloir supprimer cet enregistrement ?"))
      event.preventDefault();
  } 
 </script>

@endsection