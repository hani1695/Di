
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code ilot</th>
            <th>nom ilot</th>
            <th>num ilot</th>
            <th>nom arabe</th>
            <th>observation</th>
            <th>geom</th>
            <th>district</th>{{--cle etrangere--}}
            <th>commune</th>{{--cle etrangere--}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($ilot as $ilots)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $ilots->id_ilot_  }}   </td>
                <td class="tdlibelle">  {{ $ilots->nom_ilot  }}   </td>
                <td class="tdlibelle">  {{ $ilots->num_ilot  }}   </td>
                <td class="tdlibelle">  {{ $ilots->nom_arb  }}   </td>
                <td >  {{ $ilots->observation  }}   </td>
                <td >  {{ $ilots->geom  }}   </td>
                <td >  {{ $ilots->num_district  }}   </td>{{--cle etrangere--}}
                <td >  {{ $ilots->nom_c  }}   </td>{{--cle etrangere--}}

                <td>
                @if ( $privilege->modification) <a href="{{route('ilot.edit',$ilots->id_ilot_)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('ilot.destroy',$ilots->id_ilot_)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>

{{-- <div class="d-flex justify-content-left pagination">
    {!! $ilot->appends(['search'=>request('search')])->links() !!}
</div> --}}
