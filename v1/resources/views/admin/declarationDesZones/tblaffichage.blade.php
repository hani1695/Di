

    <table class="table table-bordered table-hover table-sm" id_zone="myTable" wid_zoneth="100%" >
        <thead>
            <tr>
                <th>N°</th>
                
                <th>nom</th>
                <th>num zone</th>
                <th>observation</th>
                <th>commune</th>
            
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($zones as $zone)
                <tr> 
                    <td>  {{ $loop->index +1}} </td>
                    
                    <td class="tdlibelle">  {{ $zone->nom_zone  }}   </td>
                    <td class="tdlibelle">  {{ $zone->num_zone }}   </td>
                    <td class="tdlibelle">  {{ $zone->observation }}   </td>
                    <td class="tdlibelle">  {{ $zone->nom_c }}</td>
                  
                    <td>
                  @if($privilege->modification) <a href="{{route('declarationZone.edit',$zone->id_zone)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a> @endif
                  @if($privilege->suppression)  <a href="{{route('declarationZone.destroy',$zone->id_zone)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                    </td>
                </tr> 
                
            @endforeach
        </tbody>
          
    </table>
    
