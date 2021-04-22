
<div class="table-responsive">
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code commune</th>
            <th>elevation</th>
            <th>nom commune</th>
            <th>nom commune arabe</th>
            {{-- <th>siege commune</th>
            <th>autre nom commune</th>
            <th>nature commune</th>
            <th>source des donnees</th>
            <th>geom commune</th>
            <th>zone sis</th>
            <th>distance chef</th>
            <th>population</th>
            <th>surface</th>
            <th>zone vent</th>
            <th>zone niege</th>
            <th>fk_wilaya</th>{{--cle etrangere-
            <th>fk_diara</th>  {{--cle etrangere--}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($commune as $communes)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td class="tdlibelle">  {{ $communes->code_c  }} </td>
                <td class="tdlibelle">  {{ $communes->elevation  }}   </td>
                <td class="tdlibelle">  {{ $communes->nom_c  }}   </td>
                <td class="tdlibelle">  {{ $communes->nom_c_arb  }}   </td>
                {{-- <td class="tdlibelle">  {{ $communes->siege_c  }}   </td>
                <td>  {{ $communes->autre_nom_c  }}   </td>
                <td class="tdlibelle">  {{ $communes->nature_c  }}   </td>
                <td class="tdlibelle">  {{ $communes->source_donnees  }}   </td>
                <td>  {{ $communes->geom_com  }}   </td>
                <td>  {{ $communes->zone_sis  }}   </td>
                <td class="tdlibelle">  {{ $communes->distance_chef  }}   </td>
                <td class="tdlibelle">  {{ $communes->population  }}   </td>
                <td class="tdlibelle">  {{ $communes->surface  }}   </td>
                <td class="tdlibelle">  {{ $communes->zone_vent  }}   </td>
                <td class="tdlibelle">  {{ $communes->zone_niege  }}   </td>
                <td class="tdlibelle">  {{ $communes->fk_wilaya  }}   </td>   {{--cle etrangere--
                <td class="tdlibelle">  {{ $communes->fk_diara  }}   </td>cle etrangere --}}
                <td>
                <a href="{{route('commune.detaille',$communes->code_c)}}" class="btn btn-sm btn-warning " title="detaille" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>
                @if ( $privilege->modification) <a href="{{route('commune.edit',$communes->code_c)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('commune.destroy',$communes->code_c)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            {{-- {{route('commune.edit',$communes->id)}} {{route('commune.destroy',$communes->id)}}--}} 
    </tbody>
      
</table>
</div>

<div class="d-flex justify-content-left pagination">
    {!! $commune->appends(['search'=>request('search')])->links() !!}
</div>
