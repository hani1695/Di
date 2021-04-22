
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code</th>
            <th>descreption</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($typevoie as $typevoies)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $typevoies->id_type_v  }}   </td>
                <td class="tdlibelle">  {{ $typevoies->descreption_t_v  }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('typevoie.edit',$typevoies->id_type_v)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('typevoie.destroy',$typevoies->id_type_v)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $typevoie->appends(['search'=>request('search')])->links() !!}
</div> --}}
