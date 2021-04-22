
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code</th>
            <th>descreption type adresse</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($type_adresse as $type_adresses)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $type_adresses->id_type_adr  }}   </td>
                <td class="tdlibelle">  {{ $type_adresses->descreption_t_adr  }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('type_adresse.edit',$type_adresses->id_type_adr)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('type_adresse.destroy',$type_adresses->id_type_adr)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $type_adresse->appends(['search'=>request('search')])->links() !!}
</div> --}}
