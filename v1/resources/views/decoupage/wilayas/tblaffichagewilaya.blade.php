
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code wilaya</th>
            <th>Nom wilaya</th>
            <th>Nom wilaya arabe</th>
            <th>siege wilaya</th>
            <th>autre nom wilaya</th>
            <th>geom wilaya</th>
   
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($wilayas as $wilayas)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $wilayas->code_w  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->nom_w  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->nom_w_arb  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->siege_w  }}   </td>
                <td >  {{ $wilayas->autre_nom_w  }}   </td>
                <td class="tdlibelle">  {{ $wilayas->geom_w }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('wilaya.edit',$wilayas->code_w)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('wilaya.destroy',$wilayas->code_w)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $wilaya->appends(['search'=>request('search')])->links() !!}
</div> --}}
