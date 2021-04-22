<table class="table table-bordered table-hover table-sm" id="myTable" width="100%" >
    <thead>
        <tr>
            <th>N°</th>
            
            <th>Nom construction</th>
            <th>Num zone</th>
            <th>Nom zone </th>
            <th>Wilaya </th>
            <th>Commune </th>
            <th>Actions</th>
             
        </tr>
    </thead>
    <tbody>
        
        @foreach ($consZones as $consZone)
            <tr class=""> 
                <td>  {{ $loop->index +1}} </td>
                
                <td class="tdlibelle">  {{ $consZone->nom  }}  
                <td class="tdlibelle">  {{ $consZone->num_zone  }}   </td>
                <td class="tdlibelle">  {{ $consZone->nom_zone }}   </td>
                <td class="tdlibelle">  {{ $consZone->nom_w }}   </td>
                <td class="tdlibelle">  {{ $consZone->nom_c }}   </td>
                <td> 
                    {{-- @if ( $privilege->modification) <a href="{{route('commune.edit',$communes->code_c)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif --}}
                    @if ($privilege->suppression) <a href="{{route('constructionAevaluer.destroy',$consZone->id_const_ev)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
        @endforeach
    </tbody>
      
</table>
