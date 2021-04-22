
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code daira</th>
            <th>nom daira</th>
            <th>siege daira</th>
            <th>autre_nom daira</th>
            <th>source des donnees</th>
            <th>geom</th>
            <th>wilaya</th>   {{--cle etrangere --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($daira as $dairas)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $dairas->code_d  }}   </td>
                <td class="tdlibelle">  {{ $dairas->nom_d  }}   </td>
                <td class="tdlibelle">  {{ $dairas->siege_d  }}   </td>
                <td class="tdlibelle">  {{ $dairas->autre_nom_d  }}   </td>
                <td >  {{ $dairas->source_donnees  }}   </td>
                <td class="tdlibelle">  {{ $dairas->geom_d  }}   </td>
                <td class="tdlibelle">  {{ $dairas->nom_w  }}   </td>{{--cle etrangere --}}
                <td>
                @if ( $privilege->modification) <a href="{{route('daira.edit',$dairas->code_d)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('daira.destroy',$dairas->code_d)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>

{{-- <div class="d-flex justify-content-left pagination">
    {!! $daira->appends(['search'=>request('search')])->links() !!}
</div> --}}
