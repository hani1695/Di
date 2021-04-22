
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>tache</th>
            <th>description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($tache as $taches)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $taches->tache  }}   </td>
                <td class="tdlibelle">  {{ $taches->description  }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('tache.edit',$taches->tache)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('tache.destroy',$taches->tache)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $tache->appends(['search'=>request('search')])->links() !!}
</div> --}}
