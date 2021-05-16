
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            {{-- <th>code</th> --}}
            <th>descreption</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($zone as $zones)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                {{-- <td >  {{ $zones->id_type_z  }}   </td> --}}
                <td class="tdlibelle">  {{ $zones->descreption_t_z  }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('zone.edit',$zones->id_type_z)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('zone.destroy',$zones->id_type_z)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $zone->appends(['search'=>request('search')])->links() !!}
</div> --}}
