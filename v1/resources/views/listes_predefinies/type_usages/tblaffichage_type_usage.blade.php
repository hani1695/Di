
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code usage</th>
            <th>descreption usage</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($usage as $usages)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $usages->id_usage  }}   </td>
                <td class="tdlibelle">  {{ $usages->descreption_u  }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('usage.edit',$usages->id_usage)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('usage.destroy',$usages->id_usage)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $usage->appends(['search'=>request('search')])->links() !!}
</div> --}}
