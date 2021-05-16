
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            {{-- <th>code</th> --}}
            <th>Adresse</th>
            <th>Designation</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($typezonevoies as $typezonevoie)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $typezonevoie->descreption_t_adr  }}   </td>
                <td class="tdlibelle">  {{ $typezonevoie->descreption_z_v  }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('typezonevoie.edit',$typezonevoie->id_type_z_v)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('typezonevoie.destroy',$typezonevoie->id_type_z_v)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $typezonevoie->appends(['search'=>request('search')])->links() !!}
</div> --}}
