
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            {{-- <th>Code mésure</th> --}}
            <th>Designation </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($mesure as $mesures)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                {{-- <td >  {{ $mesures->id_mesure  }}   </td> --}}
                <td class="tdlibelle">  {{ $mesures->descreption_mesure  }}   </td>

                <td>
                @if ( $privilege->modification) <a href="{{route('mesure.edit',$mesures->id_mesure)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('mesure.destroy',$mesures->id_mesure)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $mesure->appends(['search'=>request('search')])->links() !!}
</div> --}}
