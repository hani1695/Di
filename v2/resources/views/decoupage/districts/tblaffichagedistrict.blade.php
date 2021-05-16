
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            {{-- <th>code district</th> --}}
            <th> district</th>
            <th>observation</th>
            {{-- <th>geom</th> --}}
            <th>commune</th>{{--cle etranger--}}
            <th>wilaya</th>{{--cle etranger--}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($district as $districts)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                {{-- <td >  {{ $districts->id_district  }}   </td> --}}
                <td class="tdlibelle">  {{ $districts->num_district  }}   </td>
                <td class="tdlibelle">  {{ $districts->observation  }}   </td>
                {{-- <td class="tdlibelle">  {{ $districts->geom  }}   </td> --}}
                <td >  {{ $districts->nom_c  }}   </td>{{--cle etranger--}}
                <td >  {{ $districts->nom_w  }}   </td>{{--cle etranger--}}

                <td>
                @if ( $privilege->modification) <a href="{{route('district.edit',$districts->id_district)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('district.destroy',$districts->id_district)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>

{{-- <div class="d-flex justify-content-left pagination">
    {!! $district->appends(['search'=>request('search')])->links() !!}
</div> --}}
