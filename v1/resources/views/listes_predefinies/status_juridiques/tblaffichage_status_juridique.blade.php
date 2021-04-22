
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code</th>
            <th>descreption </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($status_juridique as $status_juridiques)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $status_juridiques->id_statu_j  }}   </td>
                <td class="tdlibelle">  {{ $status_juridiques->descreption_s  }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('status_juridique.edit',$status_juridiques->id_statu_j)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('status_juridique.destroy',$status_juridiques->id_statu_j)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $status_juridique->appends(['search'=>request('search')])->links() !!}
</div> --}}
