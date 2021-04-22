
<div class="table-responsive">
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
    <thead>
        <tr>
            <th>N°</th>
            
            {{-- <th>id</th> --}}
            <th>nom</th>
            <th>nom arabe</th>
            <th>usage</th>
            <th>etat construction</th>
            <th>daira</th>
            <th>wilaya</th>
            <th>geom</th>
            {{-- <th>id commune</th>
            <th>fk_id_wilaya</th>
            <th>fk_id_daira</th>
            <th>fk_district</th>
            <th>fk_ilot</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($construction as $constructions)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                {{-- <td class="tdlibelle">  {{ $constructions->id_const  }}  --}}
                <td class="tdlibelle">  {{ $constructions->nom  }}   </td>
                <td class="tdlibelle">  {{ $constructions->nom_arab  }}   </td>
                <td class="tdlibelle">  {{ $constructions->usage  }}   </td>
                <td class="tdlibelle">  {{ $constructions->etat_const  }}   </td>
                <td >  {{ $constructions->daira  }}   </td>
                <td class="tdlibelle">  {{ $constructions->wilaya  }}   </td>
                <td class="tdlibelle">  {{ $constructions->geom  }}   </td>
                {{-- <td>  {{ $constructions->fk_id_comn  }}   </td>
                <td >  {{ $constructions->fk_id_wilaya  }}   </td>
                <td class="tdlibelle">  {{ $constructions->fk_id_daira  }}   </td>
                <td class="tdlibelle">  {{ $constructions->fk_district  }}   </td>
                <td class="tdlibelle">  {{ $constructions->fk_ilot  }}   </td> --}}
                <td>
                @if ( $privilege->consultation) <a href="{{route('constructionadresse.index',$constructions->id_const)}}" class="btn btn-sm btn-warning " title="detaille" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ( $privilege->modification) <a href="{{route('construction.edit',$constructions->id_const)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('construction.destroy',$constructions->id_const)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
    </tbody>
      
</table>
</div>

<div class="d-flex justify-content-left pagination">
    {!! $construction->appends(['search'=>request('search')])->links() !!}
</div>
