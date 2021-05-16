{{-- <div class="card-body card-block">

    <div class="row ">
        
        @foreach ($directions as $direction)
       
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="
                {{  asset('storage/logoDirection/'.$direction->logo)}}"" class="card-img-top" alt="" height="250" width="200">
                <div class="card-body">
                  <h5 class="card-title ml-3" style="text-align:center"><u>{{$direction->nom}}</u></h5>                                  
                  <div class="row ">
                      <h2 class="mb-0 col-4">
                        <a class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#collapseTwo[{{ $loop->index }}]" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="far fa-edit"></i>
                        </a>
                      </h2>
                      <h2 class="mb-0 col-4">
                        <a href="{{route('tbase.edit_direction',$direction->id)}}"class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom">
                            <i class="far fa-edit"></i>
                        </a>
                      </h2>
                      <h2 class="mb-0 col-4">
                        <a href="{{route('tbase.delete_direction',$direction->id)}}"onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom">
                            <i class="fa fa-trash"></i>
                        </a>
                      </h2>
                      
                    </div>
                    <div id="collapseTwo[{{ $loop->index }}]" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">Email : {{$direction->email}}</div>
                      <div class="card-body">TEL : {{$direction->phone}}</div>
                      <div class="card-body">Region :{{$direction->nom_reg}}</div>
                      <div class="card-body">Organisme :{{$direction->Nom_Org}}</div>
                      <div class="card-body">Wilaya :{{$direction->nom_w}}</div><!--cle etrangere-->
                      <div class="card-body">commune :{{$direction->nom_c}}</div><!--cle etrangere-->
                       {{-- <div class="card-body">Wilaya :{{$direction->wilaya->nom_w}}</div><!--cle etrangere-->
                      <div class="card-body">Wilaya :{{$direction->commune->nom_c}}</div><!--cle etrangere--> 
                    </div>                                  
                  
                </div>
              </div>
        </div>              
             
        
        @endforeach

    </div>
</div> --}}


<div class="table-responsive">
  <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
      <thead>
          <tr>
              <th>N°</th>
              
              {{-- <th>id</th> --}}
              <th>Direction</th>
              <th> Email</th>
              <th>TEL</th>
              <th>Région</th>
              <th>Organisme</th>
              <th>Wilaya</th>
              <th>commune</th>
              {{-- <th>RC</th>
              <th>IA</th>
              <th>NIF</th>
              <th>Compte bancaire</th>
              <th>NSS</th>
              <th>abreger</th>
              <th>Sommeil</th>
              <th>Numero Ref</th>
              <th>Lieu Sortant</th>
              <th>Date Courrier</th>
              <th>Numero Sequentiel</th>
              <th>Visible GCPRO</th>
              <th>Guichet Unique</th>
              <th>Wilaya Agence</th>
              <th>Commune Agence</th>
              <th>Date Modif Consolid</th>
              <th>Date Modif</th> --}}
              {{-- <th> Direction Régionale</th> --}}
              <th>Action</th>
  
          </tr>
      </thead>
      <tbody>
          
        @foreach ($directions as $direction)
              <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                  <td>  {{ $loop->index +1}} </td>
                  
                  {{-- <td class="tdlibelle">  {{ $structure->id  }}  --}}
                  <td class="tdlibelle">  {{$direction->nom}}   </td>
                  <td class="tdlibelle">  {{$direction->email}}   </td>
                  <td class="tdlibelle">  {{$direction->phone}}  </td>
                  <td class="tdlibelle">  {{$direction->nom_reg}}   </td>
                  <td >  {{$direction->Nom_Org}}   </td>
                  <td class="tdlibelle">  {{$direction->nom_w}}   </td>
                  <td class="tdlibelle">  {{$direction->nom_c}}  </td>
                  {{-- <td >  {{ $structure->RC  }}   </td>
                  <td class="tdlibelle">  {{ $structure->IA  }}   </td>
                  <td class="tdlibelle">  {{ $structure->NIF  }}   </td>
                  <td class="tdlibelle">  {{ $structure->Compte_bancaire  }}   </td>
                  <td class="tdlibelle">  {{ $structure->NSS  }}   </td>
                  <td class="tdlibelle">  {{ $structure->abreger  }}   </td>
                  <td class="tdlibelle">  {{ $structure->Sommeil  }}   </td>
                  <td class="tdlibelle">  {{ $structure->NumeroRef  }}   </td>
                  <td class="tdlibelle">  {{ $structure->LieuSortant  }}   </td>
                  <td class="tdlibelle">  {{ $structure->DateCourrier  }}   </td>
                  <td class="tdlibelle">  {{ $structure->NumeroSequentiel  }}   </td>
                  <td class="tdlibelle">  {{ $structure->VisibleGCPRO  }}   </td>
                  <td class="tdlibelle">  {{ $structure->GuichetUnique  }}   </td>
                      <td >  {{ $structure->fk_wilaya  }}   </td>
                      <td class="tdlibelle">  {{ $structure->fk_commune  }}   </td>
                      <td >  {{ $structure->wilaya->nom_w  }}   </td>   cle etrangere
                      <td class="tdlibelle">  {{ $structure->commune->nom_c  }}   </td>
  
                      <td class="tdlibelle">  {{ $structure->DateModifConsolid  }}   </td>
                      <td class="tdlibelle">  {{ $structure->DateModif  }}   </td> --}}
                      {{-- <td >  {{ $structure->Nom_DR  }}   </td> --}}
                  <td>
                      {{-- <a href="{{route('tbase.detaille_structure',$structure->id)}}" class="btn btn-sm btn-info " title="detail" data-toggle="tooltip" data-placement="bottom"><i class="far fa-eye"></i></a> --}}
                  @if ( $privilege->modification) <a href="{{route('tbase.edit_direction',$direction->id)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                  @if ($privilege->suppression) <a href="{{route('tbase.delete_direction',$direction->id)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                  </td>
              </tr> 
              
              @endforeach
              {{-- {{route('tbase.edit_structure',$structure->id)}} {{route('tbase.delete_structure',$structure->id)}}--}} 
      </tbody>
        
  </table>
  </div>